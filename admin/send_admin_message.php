<?php
session_start();
include 'config.php';

if (!isset($_SESSION['admin_id'])) {
    echo 'You must be logged in as admin to send messages.';
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $message = $_POST['message'];
    $adminId = $_SESSION['admin_id'];
    $userId = $_POST['user_id'];

    $stmt = $conn->prepare('INSERT INTO messages (user_id, admin_id, message, is_admin) VALUES (?, ?, ?, 1)');
    $stmt->bind_param('iis', $userId, $adminId, $message);

    if ($stmt->execute()) {
        echo 'Message sent';
    } else {
        echo 'Failed to send message';
    }

    $stmt->close();
    $conn->close();
}
?>
