<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $orderId = $_POST['id'];
    $status = $_POST['status'];
    $reason = isset($_POST['reason']) ? $_POST['reason'] : '';

    // Update the order status and reason for cancellation if provided
    $stmt = $conn->prepare("UPDATE orders SET status = ?, reason = ? WHERE id = ?");
    $stmt->bind_param('ssi', $status, $reason, $orderId);

    if ($stmt->execute()) {
        echo 'success';
    } else {
        echo 'error';
    }

    $stmt->close();
    $conn->close();
}
?>
