<?php
include 'includes/conn.php';

// Example of fetching data from orders table joining with order_items table
$sql = "SELECT o.idnumber, o.fname, o.lname, o.email, o.phone, o.address, 
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
        GROUP BY o.order_id"; // Grouping by order_id to get all order items in one row per order

$result = mysqli_query($conn, $sql);

if (!$result) {
    die("Database query failed."); // Handle the error as per your application's logic
}

include 'includes/session.php'; // Start session if not already started
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
          <div class="col-xs-12">
            <h3>Confirmed Payments</h3>
            
    <div class="box box-info">
          <div class="box-body table-responsive">
                <div style="overflow-x: auto;">
                  <table id="ordersTable" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>ID Number</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Product Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total</th>
                        <th>Total Amount</th>
                        <th>Transaction Code</th>
                        <th>Payment Status</th>
                        <th>Date Paid</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                        <tr>
                          <td><?php echo $row['idnumber']; ?></td>
                          <td><?php echo $row['fname']; ?></td>
                          <td><?php echo $row['lname']; ?></td>
                          <td><?php echo $row['email']; ?></td>
                          <td><?php echo $row['phone']; ?></td>
                          <td><?php echo $row['address']; ?></td>
                          <td><?php echo nl2br($row['product_names']); ?></td>
                          <td><?php echo nl2br($row['prices']); ?></td>
                          <td><?php echo nl2br($row['quantities']); ?></td>
                          <td><?php echo nl2br($row['totals']); ?></td>
                          <td><?php echo $row['totalamount']; ?></td>
                          <td><?php echo $row['transactioncode']; ?></td>
                          <td>
                            <?php 
                              if ($row['payment_status'] == 0) {
                                echo "Paid and Not Approved";
                              } elseif ($row['payment_status'] == 1) {
                                echo "Paid and Approved"; 
                              } 
                            ?>
                          </td>
                          <td><?php echo $row['date_paid']; ?></td>
                          <td>
                            <?php if ($row['payment_status'] == 1) : ?>
                              <button class="btn btn-primary" onclick="printReceipt('<?php echo $row['idnumber']; ?>', '<?php echo addslashes(nl2br($row['product_names'])); ?>', '<?php echo addslashes(nl2br($row['prices'])); ?>', '<?php echo addslashes(nl2br($row['quantities'])); ?>', '<?php echo addslashes(nl2br($row['totals'])); ?>', '<?php echo $row['totalamount']; ?>', '<?php echo $row['transactioncode']; ?>', '<?php echo $row['date_paid']; ?>')">Receipt</button>
                            <?php endif; ?>
                          </td>
                        </tr>
                      <?php endwhile; ?>
                    </tbody>
                  </table>
                </div>
              </div>
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


  function printReceipt(orderId, productNames, prices, quantities, totals, totalAmount, transactionCode, datePaid) {
    // Open a new window with receipt details
    var receiptWindow = window.open('', '_blank');
    receiptWindow.document.write('<html><head><title>Receipt</title>');
    // Style for the receipt
    receiptWindow.document.write('<style>');
    receiptWindow.document.write('body { font-family: Arial, sans-serif; }');
    receiptWindow.document.write('.receipt-container { width: 80%; margin: 0 auto; }');
    receiptWindow.document.write('.company-details { text-align: center; margin-bottom: 20px; }');
    receiptWindow.document.write('.logo { max-width: 150px; height: auto; }');
    receiptWindow.document.write('.receipt-header { text-align: center; margin-bottom: 20px; }');
    receiptWindow.document.write('.receipt-details { margin-bottom: 20px; }');
    receiptWindow.document.write('.receipt-details table { width: 100%; border-collapse: collapse; }');
    receiptWindow.document.write('.receipt-details th, .receipt-details td { padding: 8px; border: 1px solid #ccc; text-align: center; }');
    receiptWindow.document.write('.receipt-total { margin-top: 20px; text-align: right; }');
    receiptWindow.document.write('</style>');
    receiptWindow.document.write('</head><body>');
    
    // Company details and logo
    receiptWindow.document.write('<div class="receipt-container">');
    receiptWindow.document.write('<div class="company-details">');
    receiptWindow.document.write('<img src="img/logo.jpg" alt="Company Logo" class="logo">');
    receiptWindow.document.write('<p>Chemolex</p>');
    receiptWindow.document.write('<p>Ngong Road, Nairobi, Kenya</p>');
    receiptWindow.document.write('<p>Contact: +254787379737</p>');
    receiptWindow.document.write('</div>');

    // Receipt header
    receiptWindow.document.write('<div class="receipt-header">');
    receiptWindow.document.write('<h2>Order Receipt</h2>');
    receiptWindow.document.write('</div>');

    // Receipt details
    receiptWindow.document.write('<div class="receipt-details">');
    receiptWindow.document.write('<table>');
    receiptWindow.document.write('<thead>');
    receiptWindow.document.write('<tr>');
    receiptWindow.document.write('<th>Product Name</th>');
    receiptWindow.document.write('<th>Price</th>');
    receiptWindow.document.write('<th>Quantity</th>');
    receiptWindow.document.write('<th>Total</th>');
    receiptWindow.document.write('</tr>');
    receiptWindow.document.write('</thead>');
    receiptWindow.document.write('<tbody>');

    // Split and display product details
    var productNamesArray = productNames.split('<br>');
    var pricesArray = prices.split('<br>');
    var quantitiesArray = quantities.split('<br>');
    var totalsArray = totals.split('<br>');

    for (var i = 0; i < productNamesArray.length; i++) {
      receiptWindow.document.write('<tr>');
      receiptWindow.document.write('<td>' + productNamesArray[i] + '</td>');
      if (productNamesArray[i].trim() === 'Total Price') {
        receiptWindow.document.write('<td></td>'); // Empty cell for Price
        receiptWindow.document.write('<td></td>'); // Empty cell for Quantity
      } else {
        receiptWindow.document.write('<td>' + pricesArray[i] + '</td>');
        receiptWindow.document.write('<td>' + quantitiesArray[i] + '</td>');
      }
      receiptWindow.document.write('<td>' + totalsArray[i] + '</td>');
      receiptWindow.document.write('</tr>');
    }

    receiptWindow.document.write('</tbody>');
    receiptWindow.document.write('</table>');
    receiptWindow.document.write('</div>');

    // Total amount, transaction code, and date paid
    receiptWindow.document.write('<div class="receipt-total">');
    receiptWindow.document.write('<p><strong>Total Amount:</strong> ' + totalAmount + '</p>');
    receiptWindow.document.write('<p><strong>Transaction Code:</strong> ' + transactionCode + '</p>');
    receiptWindow.document.write('<p><strong>Date Paid:</strong> ' + datePaid + '</p>');
    receiptWindow.document.write('</div>');

    receiptWindow.document.write('</div>'); // Close receipt-container
    receiptWindow.document.write('</body></html>');
    receiptWindow.document.close();
    receiptWindow.print(); // Automatically trigger print dialog
  }
</script>

</body>
</html>
