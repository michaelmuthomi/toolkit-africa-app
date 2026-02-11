<?php
include 'includes/session.php'; 

// Get the supply ID from the query string
if (isset($_GET['supply_id'])) {
    $supplyId = $_GET['supply_id'];

    // Retrieve supply details for the receipt
    $stmt = $conn->prepare("SELECT * FROM supplies WHERE id = ?");
    $stmt->bind_param('i', $supplyId);
    $stmt->execute();
    $result = $stmt->get_result();
    $supply = $result->fetch_assoc();
    $stmt->close();

    if ($supply && $supply['payment_status'] == 4) {
        // Receipt HTML structure
        $company_name = "Toolkit Africa";  // Replace with actual company name
        $company_logo = "logo.jpg";   // Replace with actual logo path
        $company_address = "Ngong Road, Nairobi, Kenya";
        $company_phone = "+2547 87379737";

        $output = "<div style='width: 80%; margin: auto; font-family: Arial, sans-serif;'>
                    <div style='text-align: center;'>
                        <h1>" . htmlspecialchars($company_name) . "</h1>
                        <img src='" . htmlspecialchars($company_logo) . "' alt='Company Logo' style='width: 150px; height: auto;'><br>
                        <p>" . htmlspecialchars($company_address) . "<br>Phone: " . htmlspecialchars($company_phone) . "</p>
                        <hr style='border: 1px solid #000;'>
                        <h2>Payment Receipt</h2>
                    </div>
                    <div style='margin: 20px 0; display: flex; justify-content: space-between;'>
                        <div style='width: 45%;'>
                            <p><strong>Full Name:</strong> " . htmlspecialchars($supply['fname']) . " " . htmlspecialchars($supply['lname']) . "</p>
                            <p><strong>Email:</strong> " . htmlspecialchars($supply['email']) . "</p>
                            <p><strong>Phone:</strong> " . htmlspecialchars($supply['phone']) . "</p>
                        </div>
                        <div style='width: 45%; text-align: right;'>
                            <p><strong>Date:</strong> " . date('Y-m-d') . "</p>
                        </div>
                    </div>
                    <hr style='border: 1px solid #000;'>
                    <h3>Supplies Details</h3>
                    <table border='1' cellpadding='8' cellspacing='0' width='100%' style='border-collapse: collapse;'>
                        <thead>
                            <tr>
                                <th style='border: 1px solid #000;'>Title</th>
                                <th style='border: 1px solid #000;'>Description</th>
                                <th style='border: 1px solid #000;'>Quantity</th>
                                <th style='border: 1px solid #000;'>Unit Price</th>
                                <th style='border: 1px solid #000;'>Amount Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td style='border: 1px solid #000;'>" . htmlspecialchars($supply['title']) . "</td>
                                <td style='border: 1px solid #000;'>" . htmlspecialchars($supply['description']) . "</td>
                                <td style='border: 1px solid #000;'>" . htmlspecialchars($supply['quantity']) . "</td>
                                <td style='border: 1px solid #000;'>KSh " . number_format($supply['unit_price'], 2) . "</td>
                                <td style='border: 1px solid #000;'>KSh " . number_format($supply['amount'], 2) . "</td>
                            </tr>
                        </tbody>
                    </table>
                    <hr style='border: 1px solid #000;'>
                    <div style='text-align: center;'>
                        <p><strong>Total Amount: KSh " . number_format($supply['amount'], 2) . "</strong></p>
                    </div>
                    <div style='text-align: center; margin-top: 30px;'>
                        <p>Thank you for your partnership!</p>
                    </div>
                </div>";
        
        echo $output;
    } else {
        echo "<p>Receipt cannot be generated for this supply.</p>";
    }
} else {
    echo "<p>No supply ID provided.</p>";
}
?>
