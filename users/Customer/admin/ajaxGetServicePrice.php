<?php
// Example response in ajaxGetServicePrice.php
if (isset($_GET['serviceId'])) {
    $serviceId = intval($_GET['serviceId']);
    $qry = "SELECT price FROM services WHERE id = ?";
    $stmt = $conn->prepare($qry);
    $stmt->bind_param('i', $serviceId);
    $stmt->execute();
    $result = $stmt->get_result();
    if ($row = $result->fetch_assoc()) {
        $price = $row['price'];
        echo "<span data-price='{$price}'>Ksh {$price}</span>";
    } else {
        echo "Service not found.";
    }
}
?>
