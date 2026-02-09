<?php
include 'includes/session.php';

if(isset($_POST['no'])) {
    $_SESSION['order_no'] = $_POST['no'];
}

// Redirect back to the page with the modal
header('Location: allocate_driver.php?openmodal=true');
exit();
?>