<?php
session_start();
include 'config.php';

$userId = $_SESSION['user_id'];
$adminId = 1; // Assuming admin has user_id = 1
$message = $_POST['message'];

if (!empty($message)) {
    $stmt = $conn->prepare("INSERT INTO messages (sender_id, receiver_id, message) VALUES (?, ?, ?)");
    $stmt->bind_param("iis", $userId, $adminId, $message);
    $stmt->execute();
    $stmt->close();
}
?>
