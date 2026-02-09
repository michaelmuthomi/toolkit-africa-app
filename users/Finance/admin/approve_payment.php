<?php
// Include session and database connection
include 'includes/session.php';
include 'includes/dbcon.php'; 

// Check if form is submitted and booking_id is set
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['booking_id'])) {
    // Sanitize input to prevent SQL injection
    $booking_id = filter_input(INPUT_POST, 'booking_id', FILTER_SANITIZE_NUMBER_INT);

    // Update payment_status to '1' (Approved) in the booking table
    $statement = $pdo->prepare("UPDATE booking SET payment_status = '1' WHERE booking_id = :booking_id");
    $statement->execute(array(':booking_id' => $booking_id));

    // Set success message in session
    $_SESSION['success'] = "Payment approved successfully.";

    // Redirect back to the Finance Panel page
    header("Location: pending-payments.php");
    exit();
} else {
    // Redirect to an error page or handle invalid requests
    $_SESSION['error'] = "Invalid request.";
    header("Location: error.php");
    exit();
}
?>
