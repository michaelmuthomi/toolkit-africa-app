<?php
include 'includes/session.php';
include 'includes/slugify.php';
include 'includes/header.php'; // Include your database connection script

// Check if user is logged in
if (!isset($_SESSION['admin'])) {
    // Redirect to login page or handle unauthorized access
    header("Location: index.php");
    exit();
}

$user_id = $_SESSION['admin'];

// Query to fetch services
$query = "SELECT * FROM services";
$result = mysqli_query($conn, $query);

// Check if services are fetched
if (!$result) {
    $_SESSION['error'] = "Error fetching services.";
    header("Location: home.php");
    exit();
}

// Fetch customer details
$customer_query = "SELECT fname, lname, phone, email FROM customer WHERE fname = '$user_id'";
$customer_result = mysqli_query($conn, $customer_query);

if ($customer_result) {
    $customer = mysqli_fetch_assoc($customer_result);
} else {
    $_SESSION['error'] = "Error fetching customer details.";
    header("Location: home.php");
    exit();
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $service_id = $_POST['service_id'];
    $rating = $_POST['rating'];
    $feedback = $_POST['feedback'];
    
    // Fetch customer details again
    $customer_query = "SELECT fname, lname, phone, email FROM customer WHERE fname = '$user_id'";
    $customer_result = mysqli_query($conn, $customer_query);

    if ($customer_result) {
        $customer = mysqli_fetch_assoc($customer_result);
    } else {
        $_SESSION['error'] = "Error fetching customer details.";
        header("Location: home.php");
        exit();
    }

    // Insert rating into the ratings table
    $insert_query = "INSERT INTO ratings (fname, lname, phone, email, service, rating, feedback)
                     VALUES ('{$customer['fname']}', '{$customer['lname']}', '{$customer['phone']}', '{$customer['email']}','$service_id', '$rating', '$feedback')";
    
    if (mysqli_query($conn, $insert_query)) {
        $_SESSION['success'] = "Thank you for rating our services. Your feedback is really important to us to be better. ";
    } else {
        $_SESSION['error'] = "Error submitting rating.";
    }
    header("Location: ratings.php");
    exit();
}
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <!--<h4>Customer Panel</h4>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>-->
      </section>

      <!-- Main content -->
      <section class="content">
        <?php
        // Display success or error messages if set in session
        if (isset($_SESSION['error'])) {
            echo "
            <div class='alert alert-danger alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-warning'></i> Error!</h4>
                " . $_SESSION['error'] . "
            </div>
            ";
            unset($_SESSION['error']);
        }
        if (isset($_SESSION['success'])) {
            echo "
            <div class='alert alert-success alert-dismissible'>
                <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                <h4><i class='icon fa fa-check'></i> Success!</h4>
                " . $_SESSION['success'] . "
            </div>
            ";
            unset($_SESSION['success']);
        }
        ?>

        <!-- Centered Card with Rating Form -->
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-md-8">
              <div class="card bg-white shadow-sm border-primary">
                <div class="card-header bg-primary text-white">
                  <h5 class="card-title mb-0">Rate a Service</h5>
                </div>
                <div class="card-body">
                  <form action="" method="POST">
                    <div class="form-group">
                      <label for="service">Select a service:</label>
                      <select id="service" name="service_id" class="form-control" required>
                        <option value="">-- Select a Service --</option>
                        <?php while ($service = mysqli_fetch_assoc($result)) : ?>
                          <option value="<?php echo $service['service_name']; ?>">
                            <?php echo htmlspecialchars($service['service_name']); ?>
                          </option>
                        <?php endwhile; ?>
                      </select>
                    </div>

                    <div class="form-group">
                      <label for="rating">Rate this service:</label>
                      <!-- Star rating system with emojis -->
                      <div class="rating d-flex">
                        <input type="radio" id="star1" name="rating" value="1" required hidden>
                        <label for="star1" title="1 star"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star2" name="rating" value="2" required hidden>
                        <label for="star2" title="2 stars"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star3" name="rating" value="3" required hidden>
                        <label for="star3" title="3 stars"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star4" name="rating" value="4" required hidden>
                        <label for="star4" title="4 stars"><i class="fas fa-star"></i></label>
                        <input type="radio" id="star5" name="rating" value="5" required hidden>
                        <label for="star5" title="5 stars"><i class="fas fa-star"></i></label>
                      </div>
                      <div id="emoji-reaction" class="text-center mt-2">
                        <span id="emoji-1" class="rating-emoji" style="display: none;">😢</span>
                        <span id="emoji-2" class="rating-emoji" style="display: none;">🙁</span>
                        <span id="emoji-3" class="rating-emoji" style="display: none;">😐</span>
                        <span id="emoji-4" class="rating-emoji" style="display: none;">😊</span>
                        <span id="emoji-5" class="rating-emoji" style="display: none;">😄</span>                        
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="feedback">Feedback:</label>
                      <textarea id="feedback" name="feedback" class="form-control" rows="4" placeholder="Write your feedback here..." required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Submit Rating</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php include 'includes/footer.php'; ?>
  </div>
  <!-- ./wrapper -->

  <?php include 'includes/scripts.php'; ?>

  <style>
  .rating {
    font-size: 2rem;
    color: lightgray;
    cursor: pointer;
    margin-bottom: 1rem;
  }
 
  .card {
    margin-top: 20px;
    border-radius: 10px;
    background-color: white; /* Ensures the card background is white */
  }
  .card-header {
    border-bottom: 1px solid #ddd;
  }
  .card-body {
    padding: 20px;
  }
  .shadow-sm {
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1);
  }
  .border-primary {
    border-color: #007bff;
  }
  #emoji-reaction {
    font-size: 2rem;
    text-align: center; /* Center the emoji reaction */
  }
  .rating-emoji {
    display: inline-block;
    margin: 0 10px;
  }
</style>


  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const ratingInputs = document.querySelectorAll('.rating input');
      const emojiReactions = document.querySelectorAll('.rating-emoji');

      ratingInputs.forEach(input => {
        input.addEventListener('change', function() {
          const ratingValue = this.value;
          
          // Hide all emojis
          emojiReactions.forEach(emoji => {
            emoji.style.display = 'none';
          });

          // Show the selected emoji
          document.getElementById(`emoji-${ratingValue}`).style.display = 'inline';

          // Update star colors
          ratingInputs.forEach(radio => {
            const starLabel = radio.nextElementSibling;
            if (radio.checked || radio.id.substring(4) <= ratingValue) {
              starLabel.style.color = 'gold';
            } else {
              starLabel.style.color = 'lightgray';
            }
          });
        });
      });
    });
  </script>
</body>
</html>

<?php
// Close database connection
mysqli_close($conn);
?>
