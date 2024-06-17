<?php
session_start();
include 'config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sending a message
    $userId = $_SESSION['user_id'];
    $message = $_POST['message'];
    $isAdmin = 0;

    $stmt = $conn->prepare("INSERT INTO messages (user_id, message, is_admin) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $userId, $message, $isAdmin);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
} else {
    // Retrieving messages
    $userId = $_SESSION['user_id'];

    $stmt = $conn->prepare("SELECT messages.*, users.username FROM messages LEFT JOIN users ON messages.user_id = users.id WHERE user_id = ? OR is_admin = 1 ORDER BY timestamp ASC");
    $stmt->bind_param("i", $userId);
    $stmt->execute();
    $result = $stmt->get_result();

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    echo json_encode($messages);
}
?>
