<?php
include 'config.php';

// Function to handle user feedback
function alert($message, $type = 'success') {
    echo "<script type='text/javascript'>alert('$message');</script>";
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Ensure all required POST variables are set
    $requiredFields = ['email', 'title', 'subject', 'deadline', 'instructions', 'pages', 'price'];
    foreach ($requiredFields as $field) {
        if (!isset($_POST[$field])) {
            alert("Error: Missing required field '$field'.", 'error');
            exit;
        }
    }

    // Ensure file upload
    if (!isset($_FILES['file']) || empty($_FILES['file']['name'][0])) {
        alert("Error: No file uploaded.", 'error');
        exit;
    }

    // Handle file upload
    $target_dir = "uploads/";
    $file_path = $target_dir . basename($_FILES["file"]["name"][0]);
    if (!move_uploaded_file($_FILES["file"]["tmp_name"][0], $file_path)) {
        alert("Error: File upload failed.", 'error');
        exit;
    }

    // Prepare and bind
    $stmt = $conn->prepare("INSERT INTO orders (order_number, name, email, pmode, products, amount_paid, service, quantity, file_path, additional_instructions, deadline, status, title, subject, pages, total_price) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
    if (!$stmt) {
        alert("Error preparing statement: " . $conn->error, 'error');
        exit;
    }

    $stmt->bind_param("sssssssisisssiss", $order_number, $name, $email, $pmode, $products, $amount_paid, $service, $quantity, $file_path, $additional_instructions, $deadline, $status, $title, $subject, $pages, $total_price);

    // Set parameters
    $name = ''; // Placeholder
    $pmode = ''; // Placeholder
    $products = ''; // Placeholder
    $amount_paid = ''; // Placeholder
    $service = 'Essay Writing'; // Example service
    $quantity = $_POST['pages'];
    $status = 'Pending';

    $email = $_POST['email'];
    $title = $_POST['title'];
    $subject = $_POST['subject'];
    $deadline = $_POST['deadline'];
    $additional_instructions = $_POST['instructions'];
    $pages = $_POST['pages'];
    $total_price = $_POST['price'];

    // Generate the order number
    $sql = "SELECT IFNULL(MAX(CAST(SUBSTRING(order_number, 7) AS UNSIGNED)), 0) + 1 AS next_order_number FROM orders";
    $result = $conn->query($sql);
    if (!$result) {
        alert("Error retrieving order number: " . $conn->error, 'error');
        exit;
    }

    $row = $result->fetch_assoc();
    $next_order_number = $row['next_order_number'];
    $order_number = 'Order ' . str_pad($next_order_number, 3, '0', STR_PAD_LEFT);

    // Execute the statement
    if ($stmt->execute()) {
        alert("Order placed successfully!");
    } else {
        alert("Order failed to submit: " . $stmt->error, 'error');
    }

    $stmt->close();
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.tiny.cloud/1/i403qlo1q0myamh6arrdinf0w4it6tfmzqhowd2w2kwl3x3q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
        .form-container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 10px;
            background-color: #f9f9f9;
        }
        .form-label {
            font-weight: bold;
        }
    </style>
</head>
<body>
  <div class="container mt-5">
    <h2 class="mb-4 text-center">Order Details</h2>
    <div class="form-container">
      <form action="place_order.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3">
          <label for="email" class="form-label">Email</label>
          <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
          <label for="title" class="form-label">Topic or Title</label>
          <input type="text" class="form-control" id="title" name="title" required>
        </div>
        <div class="mb-3">
          <label for="subject" class="form-label">Subject</label>
          <select class="form-select" id="subject" name="subject" required>
            <option value="" disabled selected>Select your subject</option>
            <!-- Add your list of subjects here -->
            <option value="Math">Math</option>
            <option value="Physics">Physics</option>
            <option value="Chemistry">Chemistry</option>
            <option value="Biology">Biology</option>
            <option value="English">English</option>
            <option value="Art">Art</option>
            <option value="Business">Business</option>
            <option value="Communication Media">Communication Media</option>
            <option value="Computer Science and IT">Computer Science and IT</option>
            <option value="Creative Writing">Creative Writing</option>
            <option value="Economics">Economics</option>
            <option value="Education">Education</option>
            <option value="Engineering">Engineering</option>
            <option value="General">General</option>
            <option value="Geography">Geography</option>
            <option value="History">History</option>
            <option value="Law">Law</option>
            <option value="Leadership and Geography">Leadership and Governance</option>
            <option value="Mathematics">Mathematics</option>
            <option value="Nursing">Nursing</option>
            <option value="Philosophy">Philosophy</option>
            <option value="Physics">Physics</option>
            <option value="Psychology">Psychology</option>
            <option value="Science">Science</option>
            <option value="Sociology">Sociology</option>
            <option value="Statistics">Statistics</option>
            <option value="Technology">Technology</option>
            <!-- Add more subjects as needed -->
          </select>
        </div>
        <div class="mb-3">
          <label for="deadline" class="form-label">Deadline</label>
          <input type="date" class="form-control" id="deadline" name="deadline" required>
        </div>
        <div class="mb-3">
          <label for="instructions" class="form-label">Order Instructions</label>
          <textarea class="form-control" id="instructions" name="instructions" rows="5" required></textarea>
        </div>
        <div class="mb-3">
          <label for="file" class="form-label">Upload Files</label>
          <input type="file" class="form-control" id="file" name="file[]" multiple accept=".docx,.doc,.ppt,.pptx,.xml,.xls,.xlsx,.pdf,.png,.jpeg,.jpg,.gif,.mp3,.mp4">
        </div>
        <div class="mb-3">
          <label for="pages" class="form-label">Number of Pages</label>
          <input type="number" class="form-control" id="pages" name="pages" min="1" value="1" required onchange="updatePrice()">
        </div>
        <div class="mb-3">
          <label for="price" class="form-label">Total Price</label>
          <input type="text" class="form-control" id="price" name="price" readonly>
        </div>
        <div class="d-grid">
          <button type="submit" class="btn btn-primary btn-block">Submit</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    tinymce.init({
      selector: '#instructions',
      plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
      toolbar_mode: 'floating',
      menubar: false,
      toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
    });

    const pricePerPage = 10;

    function updatePrice() {
      const pages = document.getElementById('pages').value;
      const totalPrice = pages * pricePerPage;
      document.getElementById('price').value = `$${totalPrice}`;
    }

    document.addEventListener('DOMContentLoaded', () => {
      updatePrice(); // Set initial price
    });
  </script>
</body>
</html>
