<?php
session_start();
include 'config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $userId = $_SESSION['user_id'] ?? null;
    $adminId = $_SESSION['admin_logged_in'] ? 1 : null; // Assuming admin id is 1
    $message = $_POST['message'];
    $isAdmin = $adminId ? 1 : 0;

    $stmt = $conn->prepare("INSERT INTO messages (user_id, admin_id, message, is_admin) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("iisi", $userId, $adminId, $message, $isAdmin);
    $stmt->execute();
}
?>
