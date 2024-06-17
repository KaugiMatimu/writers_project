<?php
session_start();
if (!isset($_SESSION['admin_logged_in'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="../styles.css">
    <style type="text/css">
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    display: flex;
    height: 100vh;
}

.wrapper {
    display: flex;
    width: 100%;
}

.sidebar {
    width: 250px;
    background: #333;
    color: #fff;
    position: fixed;
    height: 100%;
    overflow-y: auto;
}

.sidebar-header {
    padding: 20px;
    background: #444;
    text-align: center;
}

.sidebar .components {
    padding: 20px 0;
}

.sidebar .components li {
    padding: 10px 20px;
    list-style: none;
}

.sidebar .components li a {
    color: #fff;
    text-decoration: none;
    display: block;
}

.sidebar .components li a:hover {
    background: #555;
}

.content {
    margin-left: 250px;
    flex-grow: 1;
    display: flex;
    flex-direction: column;
}

.header {
    background: #007bff;
    color: #fff;
    padding: 20px;
    text-align: center;
}

.main-content {
    flex-grow: 1;
    padding: 20px;
    background: #f4f4f4;
}

.footer {
    background: #333;
    color: #fff;
    padding: 10px;
    text-align: center;
}

    </style>
</head>
<body>
    <div class="wrapper">
        <nav class="sidebar">
            <div class="sidebar-header">
                <h3>Admin Panel</h3>
            </div>
            <ul class="list-unstyled components">
                <li><a href="#home">Home</a></li>
                <li><a href="#orders">Orders</a></li>
                <li><a href="#users">Users</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>

        <div class="content">
            <header class="header">
                <h2>Welcome to the Admin Panel</h2>
            </header>

            <main class="main-content">
                <p>This is the main content area. Replace this text with actual content.</p>
            </main>

            <footer class="footer">
                <p>&copy; 2024 Your Company. All Rights Reserved.</p>
            </footer>
        </div>
    </div>
</body>
</html>
