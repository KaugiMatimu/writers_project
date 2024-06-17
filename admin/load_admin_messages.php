<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['admin_id'])) {
    echo 'You must be logged in as admin to view messages.';
    exit;
}

$sql = 'SELECT m.message, u.username, m.timestamp, m.is_admin 
        FROM messages m 
        JOIN users u ON m.user_id = u.id 
        ORDER BY m.timestamp DESC';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $sender = $row['is_admin'] ? 'Admin' : htmlspecialchars($row['username']);
        echo '<div class="message">';
        echo '<strong>' . $sender . ':</strong> ';
        echo htmlspecialchars($row['message']);
        echo '<br><small>' . $row['timestamp'] . '</small>';
        echo '</div>';
    }
} else {
    echo 'No messages yet.';
}

$conn->close();
?>
