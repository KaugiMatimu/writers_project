<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service = $_POST['service'];
    $quantity = $_POST['quantity'];
    $additionalInstructions = $_POST['additional_instructions'];
    $deadline = $_POST['deadline'];
    $paymentMethod = $_POST['payment_method'];

    // Store form data in session to be used after payment
    session_start();
    $_SESSION['service'] = $service;
    $_SESSION['quantity'] = $quantity;
        $_SESSION['additional_instructions'] = $additionalInstructions;
    $_SESSION['deadline'] = $deadline;
    $_SESSION['payment_method'] = $paymentMethod;

    // File upload handling
    $uploadDirectory = 'uploads/';
    $uploadedFiles = [];
    foreach ($_FILES['file_upload']['name'] as $key => $name) {
        $fileTmpName = $_FILES['file_upload']['tmp_name'][$key];
        $filePath = $uploadDirectory . basename($name);
        if (move_uploaded_file($fileTmpName, $filePath)) {
            $uploadedFiles[] = $filePath;
        }
    }
    $_SESSION['uploaded_files'] = $uploadedFiles;

    // Redirect to appropriate payment page
    if ($paymentMethod == 'paypal') {
        header("Location: paypal_payment.php");
        exit();
    } elseif ($paymentMethod == 'card') {
        header("Location: card_payment.php");
        exit();
    } else {
        echo "Invalid payment method.";
        exit();
    }
}
?>

