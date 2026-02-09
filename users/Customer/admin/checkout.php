<?php
session_start();

// Add your checkout process here

// Clear the cart after checkout
unset($_SESSION['cart']);

header('Location: thank_you.php');
exit();
?>
