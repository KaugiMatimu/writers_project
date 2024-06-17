<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Hardcoded credentials
    $correct_username = 'admin';
    $correct_password = 'password123';

    if ($username === $correct_username && $password === $correct_password) {
        $_SESSION['admin_logged_in'] = true;
        header('Location: index.php');
        exit();
    } else {
        $_SESSION['login_error'] = 'Invalid credentials';
        header('Location: login.php');
        exit();
    }
}
?>
