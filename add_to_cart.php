<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'You must be logged in to add to cart.']);
    exit;
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service = $_POST['service'];
    $quantity = (int)$_POST['quantity'];

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = [];
    }

    if (isset($_SESSION['cart'][$service])) {
        $_SESSION['cart'][$service] += $quantity;
    } else {
        $_SESSION['cart'][$service] = $quantity;
    }

    echo json_encode($_SESSION['cart']);
}
?>
