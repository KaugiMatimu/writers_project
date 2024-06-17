<?php
session_start();
include 'config.php';

$userId = $_SESSION['user_id'];
$adminId = 1; // Assuming admin has user_id = 1

$sql = "SELECT * FROM messages WHERE (sender_id = $userId AND receiver_id = $adminId) OR (sender_id = $adminId AND receiver_id = $userId) ORDER BY timestamp";
$result = $conn->query($sql);

while ($row = $result->fetch_assoc()) {
    $className = ($row['sender_id'] == $userId) ? 'outgoing' : 'incoming';
    echo '<li class="chatbot__chat ' . $className . '">';
    if ($className === 'incoming') {
        echo '<span class="material-symbols-outlined">smart_toy</span>';
    }
    echo '<p>' . htmlspecialchars($row['message']) . '</p></li>';
}
?>
