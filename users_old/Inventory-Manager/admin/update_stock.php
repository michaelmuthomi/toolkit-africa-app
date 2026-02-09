<?php
include 'includes/conn.php'; // Include your database connection

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tender_id = $_POST['tender_id'];
    $quantity = (int)$_POST['quantity'];
    $title = $_POST['title'];

    // Input validation
    if (empty($tender_id) || empty($quantity) || empty($title)) {
        echo json_encode(['success' => false, 'message' => 'Invalid data.']);
        exit();
    }

    // Fetch the current stock of the product
    $stmt = $conn->prepare("SELECT stock FROM products WHERE product_name = ?");
    $stmt->bind_param("s", $title);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $product = $result->fetch_assoc();
        $new_stock = $product['stock'] + $quantity;

        // Update the stock
        $update_stmt = $conn->prepare("UPDATE products SET stock = ? WHERE product_name = ?");
        $update_stmt->bind_param("is", $new_stock, $title);

        if ($update_stmt->execute()) {
            echo json_encode(['success' => true, 'message' => 'Stock updated successfully.']);
            header('Location: home.php');  // Redirect to home.php
            exit();  // Ensure no further code is executed after redirection
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to update stock.']);
        }

        $update_stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Product not found.']);
    }

    $stmt->close();
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method.']);
}

$conn->close();
?>
