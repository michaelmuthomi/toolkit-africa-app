<?php
include 'includes/conn.php';

// Start the session to get the logged-in user's details
include 'includes/session.php';

// Retrieve the logged-in user's first name from the session
$first_name = $_SESSION['admin'];

if (!$first_name) {
    die("User is not logged in."); // Handle the error as per your application's logic
}

// Modify the SQL query to filter data by the logged-in user's first name
$sql = "SELECT o.idnumber, o.fname, o.lname, o.email, o.phone, o.address, o.order_id, 
               GROUP_CONCAT(oi.product_name ORDER BY oi.order_item_id SEPARATOR '<br>') as product_names,
               GROUP_CONCAT(CASE WHEN oi.product_name = 'Total Price' THEN NULL ELSE oi.price END ORDER BY oi.order_item_id SEPARATOR '<br>') as prices,
               GROUP_CONCAT(CASE WHEN oi.product_name = 'Total Price' THEN NULL ELSE oi.quantity END ORDER BY oi.order_item_id SEPARATOR '<br>') as quantities,
               GROUP_CONCAT(oi.total ORDER BY oi.order_item_id SEPARATOR '<br>') as totals,
               o.totalamount, 
               o.transactioncode, 
               o.payment_status, 
               o.date_paid
        FROM orders o
        INNER JOIN order_items oi ON o.order_id = oi.order_id
        WHERE o.fname = ?  -- Filter by the logged-in user's first name
        GROUP BY o.order_id"; // Grouping by order_id to get all order items in one row per order

// Prepare and execute the query
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $first_name); // 's' for string
$stmt->execute();
$result = $stmt->get_result();

if (!$result) {
    die("Database query failed."); // Handle the error as per your application's logic
}

include 'includes/slugify.php';
include 'includes/header.php';
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <?php include 'includes/navbar.php'; ?>
    <?php include 'includes/menubar.php'; ?>

    <div class="content-wrapper">
      <section class="content-header">
        <!--<h4>Customer Panel</h4>
        <ol class="breadcrumb">
          <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
          <li class="active">Dashboard</li>
        </ol>-->
      </section>

      <section class="content">
      <div class="row">
            <div class="col-lg-12">
                <div class="info-container">
                    <h1>Contact Us</h1>
                    <p class="highlight">Toolkit Africa</p>

                    <h5>Address:</h5>
                    <p class="highlight">Matigari Hse, Ruaraka, Outer Ring Road Nairobi.</p>

                    <h5>Phone:</h5>
                    <p class="highlight"><a href="tel:+254716009679">+2547 1600 9679</a></p>

                    <h5>Email:</h5>
                    <p class="highlight"><a href="mailto:info@toolkit africa.co.ke">info@toolkit africa.co.ke</a></p>

                    <h5>Office Hours:</h5>
                    <p class="highlight">Weekdays : 8AM to 5PM</p>
                    <p class="highlight">Weekends: OFF</p>
                </div>
            </div>
        </div>
      </section>
    </div>

    <?php include 'includes/footer.php'; ?>
  </div>
  <?php include 'includes/scripts.php'; ?>
  
  <script>
    $(function () {
      // Initialize DataTables
      $('#ordersTable').DataTable({
        "scrollX": true, // Enable horizontal scrolling if needed
        "scrollY": "400px", // Set a fixed vertical scroll height, adjust as needed
        "scrollCollapse": true,
        "paging": false // Disable pagination (optional)
      });
    });

</script>
<script>
$(document).ready(function() {
    // Event delegation to handle dynamically added buttons
    $(document).on('click', '#generateReceiptBtn', function() {
        var orderId = $(this).data('order-id'); // Correct attribute

        if (orderId) {
            $.ajax({
                url: 'fetch-productsreceipt.php',
                type: 'POST',
                data: { orderId: orderId }, // Correctly use orderId here
                success: function(data) {
                    // Create a new window or use a modal for printing
                    var printWindow = window.open('', '', 'height=600,width=800');
                    printWindow.document.write('<html><head><title>Receipt</title>');
                    printWindow.document.write('<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">'); // Optional CSS
                    printWindow.document.write('</head><body>');
                    printWindow.document.write(data);
                    printWindow.document.write('</body></html>');
                    printWindow.document.close();
                    printWindow.focus();
                    printWindow.print(); // Automatically triggers print dialog
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ' + status + ' - ' + error);
                    alert('An error occurred while generating the receipt. Please try again.');
                }
            });
        } else {
            console.error('Invalid Order ID.');
            alert('Invalid Order ID. Please try again.');
        }
    });
});
</script>


</body>
</html>
