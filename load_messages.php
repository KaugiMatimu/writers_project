<?php
session_start();
include 'db_connection.php';

if (!isset($_SESSION['admin_id'])) {
    echo 'Welcome.';
    exit;
}

$sql = 'SELECT id, username FROM users ORDER BY username ASC';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<option value="' . $row['id'] . '">' . htmlspecialchars($row['username']) . '</option>';
    }
} else {
    echo '<option value="">No users available</option>';
}

$conn->close();
?>
