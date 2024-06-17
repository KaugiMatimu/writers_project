<?php
session_start();
include 'config.php'; // Database connection

$userId = $_SESSION['user_id'] ?? null;
$adminId = $_SESSION['admin_logged_in'] ? 1 : null;

if ($userId || $adminId) {
    $stmt = $conn->prepare("
        SELECT m.*, u.username AS user_name, a.username AS admin_name
        FROM messages m
        LEFT JOIN users u ON m.user_id = u.id
        LEFT JOIN admins a ON m.admin_id = a.id
        ORDER BY m.timestamp
    ");
    $stmt->execute();
    $result = $stmt->get_result();
    $messages = $result->fetch_all(MYSQLI_ASSOC);

    echo json_encode($messages);
}
?>
