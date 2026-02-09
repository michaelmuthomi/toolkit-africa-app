<?php
// Include necessary PHP files
include 'includes/session.php';
include 'includes/header.php';
include 'includes/dbcon.php'; // Assuming this file initializes $pdo

// Ensure customer is provided and numeric
if (isset($_GET['idnumber']) && is_numeric($_GET['idnumber'])) {
    $trainee_id = $_GET['idnumber'];

    // Fetch booking details based on customer
    $statement = $pdo->prepare("SELECT * FROM booking WHERE idnumber = :idnumber");
    $statement->bindParam(':idnumber', $trainee_id, PDO::PARAM_INT);
    $statement->execute();
    $booking = $statement->fetch(PDO::FETCH_ASSOC);

    if ($booking) {
        // Proceed to create PDF using mPDF
        require_once __DIR__ . '/vendor/autoload.php'; // Adjust the path as per your setup

        // Create new mPDF instance
        $mpdf = new \Mpdf\Mpdf();

        // HTML content for the receipt
        $html = '
            <html>
            <head>
                <meta charset="utf-8">
                <title>Receipt</title>
                <style>
                    /* Add custom CSS styles for receipt layout */
                    body {
                        font-family: Arial, sans-serif;
                    }
                    .receipt-container {
                        max-width: 800px;
                        margin: 0 auto;
                        padding: 20px;
                        border: 1px solid #ccc;
                        background-color: #fff;
                    }
                    .logo img {
                        max-width: 150px; /* Adjust logo size as needed */
                        height: auto;
                    }
                    .receipt-header {
                        text-align: center;
                        margin-bottom: 20px;
                    }
                    .receipt-header h2 {
                        margin-top: 0;
                    }
                    .receipt-details {
                        margin-bottom: 20px;
                    }
                    .receipt-details table {
                        width: 100%;
                        border-collapse: collapse;
                    }
                    .receipt-details table th,
                    .receipt-details table td {
                        border: 1px solid #ccc;
                        padding: 8px;
                        text-align: left;
                    }
                </style>
            </head>
            <body>
                <div class="receipt-container">
                    <div class="logo">
                        <center><img src="img/logo2.jpg" alt="Logo"></center>
                    </div>
                    <div class="receipt-header">
                        <h2>Payment Receipt</h2>
                    </div>
                    <div class="receipt-details">
                        <table>
                            <tr>
                                <th>Booking ID</th>
                                <td>' . htmlspecialchars($booking['booking_id']) . '</td>
                            </tr>
                            <tr>
                                <th>Name</th>
                                <td>' . htmlspecialchars($booking['fname']) . ' ' . htmlspecialchars($booking['lname']) . '</td>
                            </tr>
                            <tr>
                                <th>Email</th>
                                <td>' . htmlspecialchars($booking['email']) . '</td>
                            </tr>
                            <tr>
                                <th>Service</th>
                                <td>' . htmlspecialchars($booking['service']) . '</td>
                            </tr>
                            <tr>
                                <th>Charges</th>
                                <td>$' . htmlspecialchars($booking['charges']) . '</td>
                            </tr>
                            <tr>
                                <th>Date</th>
                                <td>' . htmlspecialchars($booking['date']) . '</td>
                            </tr>
                            <!-- Add more details as needed -->
                        </table>
                    </div>
                    <div>
                        <p><strong>Status:</strong> ' . ($booking['payment_status'] == '1' ? 'Paid and Approved' : 'Paid, Not Yet Approved') . '</p>
                    </div>
                </div>
            </body>
            </html>
        ';

        // Write HTML content to PDF
        $mpdf->WriteHTML($html);

        // Output PDF as a downloadable file
        $mpdf->Output('receipt.pdf', 'D'); // 'D' means download, 'I' means inline
        exit();
    } else {
        // Handle case where booking details are not found
        $_SESSION['error'] = "No booking found for the provided ID.";
        header("Location: home.php"); // Redirect to a suitable page
        exit();
    }
} else {
    // Redirect or handle error if trainee_id is missing or invalid
    $_SESSION['error'] = "Invalid Customer ID.";
    header("Location: home.php"); // Redirect to a suitable page
    exit();
}
?>
