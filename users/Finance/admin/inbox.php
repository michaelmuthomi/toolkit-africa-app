<?php
include 'includes/session.php';
include 'includes/slugify.php';
include 'includes/header.php';
include 'includes/conn.php'; // Include your database connection

// Define role-based messaging permissions
$permissions = [
    'customer' => ['inventorymanager', 'supervisor', 'dispatchmanager', 'finance', 'driver'],
    'inventorymanager' => ['customer', 'dispatchmanager', 'finance', 'driver', 'supplier'],
    'supervisor' => ['customer', 'servicemanager', 'bnote_cleaner', 'dispatch'],
    'servicemanager' => ['servicemanager', 'supervisor', 'bnote_cleaner', 'customer'],
    //'inspector' => ['inventory manager', 'customer'],
    'bnote_cleaner' => ['servicemanager', 'supervisor'],
    'dispatchmanager' => ['inventorymanager', 'driver', 'customer'],
    'finance' => ['customer','inventorymanager', 'dispatchmanager'],
    'driver' => ['dispatchmanager', 'customer'],
    'supplier' => ['inventorymanager']
];

// Ensure session is set and user ID is available
if (!isset($_SESSION['admin'])) {
    echo 'User not logged in.';
    exit();
}

$currentUserFname = $_SESSION['admin']; // Get current user's fname from session

// Define the tables and their corresponding roles
$tables = [
    'customer' => 'customer',
    'inventorymanager' => 'inventorymanager',
    'finance' => 'finance',
    'supervisor' => 'supervisor',
    'servicemanager' => 'servicemanager',
    'bnote_cleaner' => 'bnote_cleaner',
    'dispatchmanager' => 'dispatchmanager',
    'driver' => 'driver',
    'supplier' => 'supplier'
];

// Function to get user details from a table
function getUserDetails($conn, $userFname, $table) {
    $query = "SELECT fname, lname FROM $table WHERE fname = ?";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param('s', $userFname);
    $stmt->execute();
    return $stmt->get_result()->fetch_assoc();
}

// Function to get unread messages count
function getUnreadMessagesCount($conn, $userFname) {
    $query = "SELECT COUNT(*) as count FROM messages WHERE receiver_fname = ? AND read_status = 'unread'";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param('s', $userFname);
    $stmt->execute();
    $result = $stmt->get_result();
    return $result->fetch_assoc()['count'];
}

// Function to update message read status
function updateMessageReadStatus($conn, $senderFname, $receiverFname) {
    $query = "UPDATE messages SET read_status = 'read' WHERE sender_fname = ? AND receiver_fname = ? AND read_status = 'unread'";
    $stmt = $conn->prepare($query);
    if ($stmt === false) {
        die('Prepare failed: ' . htmlspecialchars($conn->error));
    }
    $stmt->bind_param('ss', $senderFname, $receiverFname);
    $stmt->execute();
}

// Get current user's role based on the table they belong to
$currentUserRole = null;
$currentUserTable = null;
foreach ($tables as $role => $table) {
    $details = getUserDetails($conn, $currentUserFname, $table);
    if ($details) {
        $currentUserRole = $role; // Assign role based on table key
        $currentUserTable = $table;
        break;
    }
}

if (!$currentUserRole) {
    echo 'Role not found.';
    exit();
}

// Handle receiver fname and validate permissions
$receiverFname = null;
$receiverRole = null;
$receiverTable = null;

if (isset($_GET['admin']) && !empty($_GET['admin'])) {
    $receiverFname = htmlspecialchars($_GET['admin']); // Sanitize the input

    foreach ($tables as $role => $table) {
        $details = getUserDetails($conn, $receiverFname, $table);
        if ($details) {
            $receiverRole = $role; // Assign role based on table key
            $receiverTable = $table;
            break;
        }
    }

    // Check if the user has permission to message the receiver
    if ($receiverRole && in_array($receiverRole, $permissions[$currentUserRole] ?? [])) {
        // Update read status of messages
        updateMessageReadStatus($conn, $currentUserFname, $receiverFname);

        // Fetch messages
        $query = "SELECT * FROM messages 
                  WHERE (sender_fname = ? AND receiver_fname = ?) 
                  OR (sender_fname = ? AND receiver_fname = ?) 
                  ORDER BY timestamp ASC";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param('ssss', $currentUserFname, $receiverFname, $receiverFname, $currentUserFname);
        $stmt->execute();
        $messages = $stmt->get_result();
    } else {
        echo '<p>You do not have permission to message this user.</p>';
        exit();
    }
}

// Handle new message
if (isset($_POST['message']) && $receiverFname) {
    if (isset($receiverRole) && in_array($receiverRole, $permissions[$currentUserRole] ?? [])) {
        $message = htmlspecialchars($_POST['message']);
        $query = "INSERT INTO messages (sender_fname, receiver_fname, message, status, read_status) VALUES (?, ?, ?, 'sent', 'unread')";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->bind_param('sss', $currentUserFname, $receiverFname, $message);
        if ($stmt->execute()) {
            $_SESSION['success'] = 'Message successfully  sent!';
        } else {
            $_SESSION['error'] = 'Failed to send message.';
        }
    } else {
        $_SESSION['error'] = 'You do not have permission to message this user.';
    }
    header('Location: inbox.php?admin=' . urlencode($receiverFname)); // Redirect to avoid form resubmission
    exit();
}

// Fetch all users that the current user can message
function getUserList($conn, $userRole) {
    global $permissions, $tables;

    $allowedRoles = $permissions[$userRole] ?? [];
    $allowedTables = array_filter($tables, function($role) use ($allowedRoles) {
        return in_array($role, $allowedRoles);
    }, ARRAY_FILTER_USE_BOTH);

    $userList = [];
    foreach ($allowedTables as $role => $table) {
        $query = "SELECT fname, lname FROM $table";
        $stmt = $conn->prepare($query);
        if ($stmt === false) {
            die('Prepare failed: ' . htmlspecialchars($conn->error));
        }
        $stmt->execute();
        $result = $stmt->get_result();
        while ($user = $result->fetch_assoc()) {
            $user['role'] = $role; // Add role to the user data
            $user['unread_messages'] = getUnreadMessagesCount($conn, $user['fname']);
            $userList[] = $user;
        }
    }

    return $userList;
}

// Fetch user list and details
$userList = getUserList($conn, $currentUserRole);
$currentUserDetails = getUserDetails($conn, $currentUserFname, $currentUserTable);
$receiverDetails = $receiverFname ? getUserDetails($conn, $receiverFname, $receiverTable) : null;
?>

<body class="hold-transition skin-blue sidebar-mini">
< class="wrapper">

  <?php include 'includes/navbar.php'; ?>
  <?php include 'includes/menubar.php'; ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <!--<h4>Message</h4>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Message</li>
      </ol>-->
    </section>

    <!-- Main content -->
    <section class="content">
      <?php
        if (isset($_SESSION['error'])) {
          echo "
            <div class='alert alert-danger alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-warning'></i> Error!</h4>
              " . htmlspecialchars($_SESSION['error']) . "
            </div>
          ";
          unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
          echo "
            <div class='alert alert-success alert-dismissible'>
              <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
              <h4><i class='icon fa fa-check'></i> Success!</h4>
              " . htmlspecialchars($_SESSION['success']) . "
            </div>
          ";
          unset($_SESSION['success']);
        }
      ?>

      <!-- Chat Container -->
      <div class="container" style="background-color: white; padding: 20px; border-radius: 8px;">
        <div class="row">
          <div class="col-md-4">
            <!-- User List -->
            <h4>Select a user to start chatting</h4>
            <ul class="list-group">
              <?php foreach ($userList as $user): ?>
                <li class="list-group-item">
                  <img src="../images/<?php echo htmlspecialchars($user['photo'] ?? 'profile.jpg'); ?>" class="user-image" alt="User Image" style="width: 20px; height: 20px; margin-right: 10px;">
                  <a href="inbox.php?admin=<?php echo urlencode($user['fname']); ?>">
                    <?php echo htmlspecialchars($user['fname']) . ' ' . htmlspecialchars($user['lname']); ?>
                    (<?php echo htmlspecialchars($user['role']); ?>) <!-- Display role -->
                    <?php if ($user['unread_messages'] > 0): ?>
                      <span class="badge badge-danger"><?php echo $user['unread_messages']; ?></span>
                    <?php endif; ?>
                  </a>
                </li>
              <?php endforeach; ?>
            </ul>
          </div>
          <div class="col-md-8">
            <div class="chat-box" style="height: 400px; overflow-y: scroll; border: 1px solid #ddd; padding: 10px;">
              <?php if ($receiverFname): ?>
                <?php while ($row = $messages->fetch_assoc()): ?>
                  <div class="<?php echo ($row['sender_fname'] == $currentUserFname) ? 'message-right' : 'message-left'; ?>">
                    <div class="message-card">
                      <img src="../images/<?php echo htmlspecialchars($row['photo'] ?? 'profile.jpg'); ?>" class="user-image" alt="User Image" style="width: 20px; height: 20px; margin-right: 10px;">
                      <p><?php echo htmlspecialchars($row['message']); ?></p>
                      <div class="message-status">
                        <?php if ($row['status'] === 'sent'): ?>
                          <div class="tick received"></div> <!-- Gray for sent (unread) -->
                        <?php endif; ?>
                        <?php if ($row['read_status'] === 'read'): ?>
                          <div class="tick read"></div> <!-- Blue for read -->
                        <?php endif; ?>
                      </div>
                      <small><?php echo date('Y-m-d H:i:s', strtotime($row['timestamp'])); ?></small>
                    </div>
                  </div>
                <?php endwhile; ?>
              <?php else: ?>
                <p>Select a user to start chatting.</p>
              <?php endif; ?>
            </div>

            <!-- Message Form -->
            <?php if ($receiverFname): ?>
              <form method="POST">
                <div class="form-group">
                  <input type="text" name="message" class="form-control" placeholder="Type your message here..." required>
                </div>
                <button type="submit" class="btn btn-primary">Send</button>
              </form>
            <?php endif; ?>
          </div>
        </div>
      </div>
    </section>
    </div>
  <?php include 'includes/footer.php'; ?>


  <style>
    .message-left {
      display: flex;
      justify-content: flex-start;
      margin-bottom: 10px;
    }

    .message-right {
      display: flex;
      justify-content: flex-end;
      margin-bottom: 10px;
    }

    .message-card {
      max-width: 60%;
      padding: 10px;
      border-radius: 5px;
      display: flex;
      align-items: center;
    }

    .message-left .message-card {
      background-color: #f8f9fa;
      border: 1px solid #e0e0e0;
    }

    .message-right .message-card {
      background-color: #007bff;
      color: white;
      border: 1px solid #0056b3;
    }

    .message-status {
      display: flex;
      align-items: center;
    }

    .message-status .tick {
      width: 10px;
      height: 10px;
      border-radius: 50%;
      margin-left: 5px;
    }

    .message-status .tick.received {
      background-color: gray; /* Gray for unread messages */
    }

    .message-status .tick.read {
      background-color: green; /* Blue for read messages */
    }

    .user-image {
      border-radius: 50%;
    }
  </style>

 <?php include 'includes/scripts.php'; ?>
</div>
</body>
</html>
