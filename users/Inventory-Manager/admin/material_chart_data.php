<?php
include 'includes/session.php';
include 'includes/conn.php';

// Get metallic materials data
$stmt = $conn->prepare("SELECT name, stock_quantity FROM materials WHERE category = 'Metallic' ORDER BY name");
$stmt->execute();
$result = $stmt->get_result();

$metallic = [
    'labels' => [],
    'data' => []
];

while($row = $result->fetch_assoc()) {
    $metallic['labels'][] = $row['name'];
    $metallic['data'][] = $row['stock_quantity'];
}

// Get plastic materials data
$stmt = $conn->prepare("SELECT name, stock_quantity FROM materials WHERE category = 'Plastic' ORDER BY name");
$stmt->execute();
$result = $stmt->get_result();

$plastic = [
    'labels' => [],
    'data' => []
];

while($row = $result->fetch_assoc()) {
    $plastic['labels'][] = $row['name'];
    $plastic['data'][] = $row['stock_quantity'];
}

// Combine the data
$data = [
    'metallic' => $metallic,
    'plastic' => $plastic
];

header('Content-Type: application/json');
echo json_encode($data);
?>