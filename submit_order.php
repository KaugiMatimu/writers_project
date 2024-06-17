<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $service = $_POST['service'];
    $quantity = $_POST['quantity'];
    $additional_instructions = $_POST['additional_instructions']; // This should fetch the textarea value correctly
    $deadline = $_POST['deadline'];
    $created_at = date('Y-m-d H:i:s');
    $amount_paid = $_POST['price'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pmode = $_POST['pmode'];
    $products = $_POST['products'];
    $file_path = '';

    // Handle file upload
    if (isset($_FILES['file_upload']) && $_FILES['file_upload']['error'][0] == UPLOAD_ERR_OK) {
        $uploads_dir = 'uploads';
        if (!is_dir($uploads_dir)) {
            mkdir($uploads_dir, 0777, true);
        }
        $file_name = basename($_FILES['file_upload']['name'][0]);
        $file_path = $uploads_dir . '/' . uniqid() . '_' . $file_name;

        if (move_uploaded_file($_FILES['file_upload']['tmp_name'][0], $file_path)) {
            // File uploaded successfully
        } else {
            // Handle file upload error
            die("Error moving the uploaded file.");
        }
    } else {
        // Handle no file uploaded or file upload error
        $file_path = null;
    }

    // Simulate database insertion
    // Replace with your database connection and actual database query
    // Connect to database
    $conn = new mysqli('localhost', 'root', '', 'writers');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Generate a unique order number
    $order_number = uniqid();

    // Prepare and execute SQL statement
    $stmt = $conn->prepare("INSERT INTO orders (order_number, name, email, pmode, products, amount_paid, service, quantity, file_path, additional_instructions, deadline, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param('sssssssisiss', $order_number, $name, $email, $pmode, $products, $amount_paid, $service, $quantity, $file_path, $additional_instructions, $deadline, $created_at);
    $stmt->execute();

    // Close statement and connection
    $stmt->close();
    $conn->close();

    // Display success message
    echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>';
    echo '<script>
        document.addEventListener("DOMContentLoaded", function() {
            Swal.fire({
                title: "Thank You!",
                text: "Your Order Has Been Submitted Successfully. Relax as Our Experts Handle Your Order.",
                icon: "success",
                confirmButtonText: "OK"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "orders.php"; // Redirect to orders page
                }
            });
        });
    </script>';
}
?>
