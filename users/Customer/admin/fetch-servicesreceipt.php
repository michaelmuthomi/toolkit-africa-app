<?php
session_start();
include 'includes/connection.php';

// Check if admin session exists
if (!isset($_SESSION['admin'])) {
    header("Location: login.php");
    exit();
}

// Ensure that the bookingId is provided
if (isset($_POST['bookingId']) && !empty($_POST['bookingId'])) {
    $bookingId = $_POST['bookingId'];

    // Prepare SQL query to fetch booking details
    $booking_query = "
        SELECT 
            booking_id, 
            idnumber, 
            fname, 
            lname, 
            email, 
            phone, 
            address, 
            service, 
            charges, 
            transactioncode, 
            payment_status,
            date
        FROM 
            booking
        WHERE 
            booking_id = ?
    ";

    if ($stmt = mysqli_prepare($conn, $booking_query)) {
        mysqli_stmt_bind_param($stmt, "s", $bookingId); // Use "s" for strings
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($result && mysqli_num_rows($result) > 0) {
            $booking = mysqli_fetch_assoc($result);

            // Company Information
            $company_name = "Toolkit Africa.";
            $company_logo = "img/logo.jpg"; // Update with the path to your logo image
            $company_address = "Ngong Road, Nairobi, Kenya";
            $company_phone = "+2547 87379737"; // Update with your company's phone number
            
            // Start Receipt HTML
            $output = "<div style='width: 80%; margin: auto; font-family: Arial, sans-serif;'>
                        <div style='text-align: center;'>
                            <h1>" . htmlspecialchars($company_name) . "</h1>
                            <img src='" . htmlspecialchars($company_logo) . "' alt='Company Logo' style='width: 150px; height: auto;'><br>
                            <p>" . htmlspecialchars($company_address) . "<br>Phone: " . htmlspecialchars($company_phone) . "</p>
                            <hr style='border: 1px solid #000;'>
                            <h2>Booking Receipt</h2>
                        </div>
                        <div style='margin: 20px 0; display: flex; justify-content: space-between;'>
                            <div style='width: 45%;'>
                                <p><strong>Full Name:</strong> " . htmlspecialchars($booking['fname']) . " " . htmlspecialchars($booking['lname']) . "</p>
                                <p><strong>Email:</strong> " . htmlspecialchars($booking['email']) . "</p>
                                <p><strong>Phone:</strong> " . htmlspecialchars($booking['phone']) . "</p>
                            </div>
                            <div style='width: 45%; text-align: right;'>
                                <p><strong>Payment Type:</strong> M-pesa</p>
                                <p><strong>Transaction Code:</strong> " . htmlspecialchars($booking['transactioncode']) . "</p>
                                <p><strong>Date:</strong> " . htmlspecialchars($booking['date']) . "</p>
                            </div>
                        </div>
                        <hr style='border: 1px solid #000;'>
                        <h3>Services</h3>
                        <table border='1' cellpadding='8' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                            <thead>
                                <tr>
                                    <th style='border: 1px solid #000;'>Service Name</th>
                                    <th style='border: 1px solid #000;'>Charges</th>
                                </tr>
                            </thead>
                            <tbody>";

            // Split services and charges
            $services_name = explode("\n", $booking['service']);
            $charges = explode("\n", $booking['charges']);

            // Ensure that the counts match
            $total_items = min(count($services_name), count($charges));

            for ($i = 0; $i < $total_items; $i++) {
                $output .= "<tr>
                                <td style='border: 1px solid #000;'>" . htmlspecialchars(trim($services_name[$i])) . "</td>
                                <td style='border: 1px solid #000;'>KSh " . htmlspecialchars(trim($charges[$i])) . "</td>
                            </tr>";
            }
            
            // Adding total amount, amount paid, and change amount at the end of the table
            $total_charges = htmlspecialchars($booking['charges']); // Assuming this is the total amount
            $output .= "<tr>
                            <td colspan='2' style='border: 1px solid #000; text-align: right;'><strong>Total Amount:</strong></td>
                            <td style='border: 1px solid #000;'>KSh " . $total_charges . "</td>
                        </tr>
                        <tr>
                            <td colspan='2' style='border: 1px solid #000; text-align: right;'><strong>Amount Paid:</strong></td>
                            <td style='border: 1px solid #000;'>KSh " . $total_charges . "</td>
                        </tr>
                        <tr>
                            <td colspan='2' style='border: 1px solid #000; text-align: right;'><strong>Change Amount:</strong></td>
                            <td style='border: 1px solid #000;'>KSh. 0.00</td>
                        </tr>";

            $output .= "</tbody></table>
                        <hr style='border: 1px solid #000;'>
                        <p style='text-align: center;'>Thank you for being our Loyal Customer!</p>
                        </div>";
            
            echo $output;
        } else {
            echo "<p>No records found for booking ID: " . htmlspecialchars($bookingId) . "</p>";
        }

        mysqli_stmt_close($stmt);
    } else {
        die("Query preparation error: " . mysqli_error($conn));
    }

    // Close the database connection
    mysqli_close($conn);
} else {
    echo "<p>Invalid booking ID provided.</p>";
}
?>
