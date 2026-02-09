<?php
include 'includes/dbcon.php';

if (isset($_POST['ord_id'])) {
    $ordId = $_POST['ord_id'];

    try {
        // Begin a database transaction
        $pdo->beginTransaction();

        // Fetch all work items with the given ord_id
        $stmt = $pdo->prepare("SELECT prod_name, quantity FROM work_items WHERE ord_id = ?");
        $stmt->execute([$ordId]);
        $workItems = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // Update the status of work items to '1' (Approved)
        $updateStatus = $pdo->prepare("UPDATE work_items SET status = 1 WHERE ord_id = ?");
        $updateStatus->execute([$ordId]);

        // Update the stock in the products table for each approved item
        $updateStock = $pdo->prepare("UPDATE products SET stock = stock - :quantity WHERE product_name = :prod_name");

        foreach ($workItems as $item) {
            $updateStock->execute([
                ':quantity' => $item['quantity'],
                ':prod_name' => $item['prod_name']
            ]);
        }

        // Commit the transaction
        $pdo->commit();

        // Return a success response
        echo 'success';
    } catch (Exception $e) {
        // Rollback the transaction if an error occurs
        $pdo->rollBack();
        error_log("Error updating stock: " . $e->getMessage());
        echo 'error';
    }
} else {
    echo 'error';
}
