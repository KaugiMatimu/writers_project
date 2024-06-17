<?php
session_start();
include 'config.php'; // Database connection

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sending a message
    $adminId = $_SESSION['admin_id'];
    $message = $_POST['message'];
    $isAdmin = 1;

    $stmt = $conn->prepare("INSERT INTO messages (user_id, message, is_admin) VALUES (?, ?, ?)");
    $stmt->bind_param("isi", $adminId, $message, $isAdmin);
    if ($stmt->execute()) {
        echo json_encode(["status" => "success"]);
    } else {
        echo json_encode(["status" => "error"]);
    }
} else {
    // Retrieving messages
    $stmt = $conn->prepare("SELECT messages.*, users.username FROM messages LEFT JOIN users ON messages.user_id = users.id ORDER BY timestamp ASC");
    $stmt->execute();
    $result = $stmt->get_result();

    $messages = [];
    while ($row = $result->fetch_assoc()) {
        $messages[] = $row;
    }

    echo json_encode($messages);
}
?>
