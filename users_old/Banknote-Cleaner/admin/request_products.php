<?php
session_start();
include 'includes/conn.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve task_id and selected products
    $task_id = $_POST['task_id'];
    $products = $_POST['products'] ?? []; // Array of selected products
    $quantities = $_POST['quantities'] ?? []; // Array of product quantities

    if (!empty($products) && !empty($quantities)) {
        // Get the current max ord_id from the work_items table
        $ord_id_query = "SELECT MAX(ord_id) AS max_ord_id FROM work_items";
        $result = mysqli_query($conn, $ord_id_query);
        $row = mysqli_fetch_assoc($result);
        $ord_id = ($row['max_ord_id'] != NULL) ? $row['max_ord_id'] + 1 : 1;

        // Fetch the status of the task from work_items
        $statusQuery = "SELECT status FROM work_items WHERE ord_id = '$task_id' LIMIT 1";
        $statusResult = mysqli_query($conn, $statusQuery);
        $statusRow = mysqli_fetch_assoc($statusResult);
        $status = $statusRow['status'] ?? 0; // Default to 0 if not found

        // Loop through selected products and process the request
        foreach ($products as $product_id) {
            // Fetch product details
            $productQuery = "SELECT product_name, description, stock FROM products WHERE product_id = '$product_id'";
            $productResult = mysqli_query($conn, $productQuery);

            if ($productRow = mysqli_fetch_assoc($productResult)) {
                $prod_name = $productRow['product_name'];
                $description = $productRow['description'];
                $product_quantity = $quantities[$product_id]; // Get the quantity for this product

                // Get the cleaner's name from the cleaner_tasks table
                $cleanerQuery = "SELECT cleaner, service, supervisor FROM cleaner_tasks WHERE No = '$task_id'";
                $cleanerResult = mysqli_query($conn, $cleanerQuery);
                $cleanerRow = mysqli_fetch_assoc($cleanerResult);
                $cleaner_name = $cleanerRow['cleaner']; // Get the cleaner's name
                $service = $cleanerRow['service'];
                $supervisor = $cleanerRow['supervisor'];

                // Check if the quantity requested is less than or equal to the stock
                if ($product_quantity <= $productRow['stock']) {
                    // Insert product request with the same ord_id into work_items table
                    $insertQuery = "INSERT INTO work_items (ord_id, service, supervisor, prod_name, description, quantity, date_requested, cleaner, status)
                                    VALUES ('$ord_id', '$service', '$supervisor', '$prod_name', '$description', '$product_quantity', NOW(), '$cleaner_name', 0)";

                    // Execute the query
                    if (!mysqli_query($conn, $insertQuery)) {
                        $_SESSION['error'] = "Failed to submit the request for product: $prod_name.";
                        header('Location: working_materials.php');
                        exit;
                    }

                    // If status is 1, update the stock for the product
                    if ($status == 1) {
                        $updateStockQuery = "UPDATE products SET stock = stock - $product_quantity WHERE product_id = '$product_id'";
                        if (!mysqli_query($conn, $updateStockQuery)) {
                            $_SESSION['error'] = "Failed to update stock for product: $prod_name.";
                            header('Location: working_materials.php');
                            exit;
                        }
                    }
                } else {
                    $_SESSION['error'] = "Insufficient stock for product: $prod_name. Available stock: {$productRow['stock']}.";
                    header('Location: working_materials.php');
                    exit;
                }
            }
        }

        // Set a success message
        $_SESSION['success'] = "Product request submitted successfully! Order ID: $ord_id";
    } else {
        $_SESSION['error'] = "Please select at least one product and specify the quantity!";
    }
} else {
    $_SESSION['error'] = "Invalid request method!";
}

// Redirect back to the working materials page
header('Location: working_materials.php');
exit;
