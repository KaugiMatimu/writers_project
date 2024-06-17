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
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Dashboard - Wise Writers</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.gstatic.com" rel="preconnect">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Nunito:300,300i,400,400i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <link
  rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
/>
<link
  rel="stylesheet"
  href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0"
/>

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.snow.css" rel="stylesheet">
  <link href="assets/vendor/quill/quill.bubble.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/simple-datatables/style.css" rel="stylesheet">
  <link rel="stylesheet" href="../style.css">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style>
    .custom-col {
  width: 200%; /* Increase this percentage as needed */
  margin-right: 18%; /* Adjust this to balance the increased width */
}
  </style>
</head>

<body>

  <!-- ======= Header ======= -->
  <header id="header" class="header fixed-top d-flex align-items-center">

    <div class="d-flex align-items-center justify-content-between">
      <a href="index.html" class="logo d-flex align-items-center">
        <img src="assets/img/logo.png" alt="">
        <span class="d-none d-lg-block">Wise Writers</span>
      </a>
      <i class="bi bi-list toggle-sidebar-btn"></i>
    </div><!-- End Logo -->

    <div class="search-bar">
      <form class="search-form d-flex align-items-center" method="POST" action="#">
        <input type="text" name="query" placeholder="Search" title="Enter search keyword">
        <button type="submit" title="Search"><i class="bi bi-search"></i></button>
      </form>
    </div><!-- End Search Bar -->

    <nav class="header-nav ms-auto">
      <ul class="d-flex align-items-center">

        <li class="nav-item d-block d-lg-none">
          <a class="nav-link nav-icon search-bar-toggle " href="#">
            <i class="bi bi-search"></i>
          </a>
        </li><!-- End Search Icon-->

        <li class="nav-item dropdown">

          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a><!-- End Notification Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Hello There</h4>
                <p>Hello to How is the going</p>
                <p>30 min. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Can you Help handle an urgent nursing order</h4>
                <p>Yes very urgent</p>
                <p>1 hr. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Hey are you capable of handling urgent orders</h4>
                <p>Yes</p>
                <p>2 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>

            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>

            <li>
              <hr class="dropdown-divider">
            </li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>

          </ul><!-- End Notification Dropdown Items -->

        </li><!-- End Notification Nav -->

         <!-- end messaging -->

        <li class="nav-item dropdown pe-3">

          <a class="nav-link nav-profile d-flex align-items-center pe-0" href="#" data-bs-toggle="dropdown">
            <img src="assets/img/profile-img.jpg" alt="Profile" class="rounded-circle">
            <span class="d-none d-md-block dropdown-toggle ps-2">Martin G.</span>
          </a><!-- End Profile Iamge Icon -->

          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow profile">
            <li class="dropdown-header">
              <h6>Martin G.</h6>
              <span>Wise Writers Admin</span>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-person"></i>
                <span>My Profile</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-gear"></i>
                <span>Account Settings</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-question-circle"></i>
                <span>Need Help?</span>
              </a>
            </li>
            <li>
              <hr class="dropdown-divider">
            </li>

            <li>
              <a class="dropdown-item d-flex align-items-center" href="#">
                <i class="bi bi-box-arrow-right"></i>
                <span>Sign Out</span>
              </a>
            </li>

          </ul><!-- End Profile Dropdown Items -->
        </li><!-- End Profile Nav -->

      </ul>
    </nav><!-- End Icons Navigation -->

  </header><!-- End Header -->

  <!-- ======= Sidebar ======= -->
  <aside id="sidebar" class="sidebar">

    <ul class="sidebar-nav" id="sidebar-nav">

      <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-grid"></i>
          <span>Dashboard</span>
        </a>
      </li><!-- End Dashboard Nav -->
            <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-file-text-fill"></i>
          <span>Orders</span>
        </a>
      </li>
            <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-cash"></i>
          <span>Payments</span>
        </a>
      </li>
            <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-paypal"></i>
          <span>PayPal</span>
        </a>
      </li>
            <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-credit-card" aria-hidden="true"></i>
          <span>Card Payment</span>
        </a>
      </li>
        <li class="nav-item">
        <a class="nav-link " href="index.html">
          <i class="bi bi-x" style="color: red;"></i>
          <span>Cancel Order</span>
        </a>
      </li>
      <!-- upload file starts here -->
      <li class="nav-item">
  <a class="nav-link" href="#" onclick="document.getElementById('uploadInput').click(); return false;">
    <i class="bi bi-upload" style="color: red;"></i>
    <span>Upload Order</span>
  </a>
  <input type="file" id="uploadInput" style="display: none;" onchange="handleFileUpload(this)">
</li>

<script>
  function handleFileUpload(input) {
    const file = input.files[0];
    if (file) {
      // Perform the file upload logic here, such as sending it to the server
      console.log('File selected:', file.name);
      // You can use FormData to send the file via AJAX or handle it in other ways
    }
  }
</script>

       <!-- upload files ends here -->
    </ul>

  </aside><!-- End Sidebar-->

  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <!-- Sales Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Orders in Progress <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>14</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div><!-- End Sales Card -->

            <!-- Revenue Card -->
            <div class="col-xxl-4 col-md-6">
              <div class="card info-card revenue-card">
                <div class="card-body">
                  <h5 class="card-title">Orders Completed</h5>
                </div>
                <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>24</h6>
                    </div>
                  </div>
              </div>
            </div><!-- End Revenue Card -->
                        <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Revision <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>3</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
                        <div class="col-xxl-4 col-md-6">
              <div class="card info-card sales-card">
                <div class="card-body">
                  <h5 class="card-title">Orders Canceled <span></span></h5>

                  <div class="d-flex align-items-center">
                    <div class="ps-3">
                      <h6>2</h6>
                    </div>
                  </div>
                </div>

              </div>
            </div>
  <!-- Recent Sales -->
        <?php
include '../config.php';

$sql = "SELECT order_number, status, quantity, amount_paid, file_path, additional_instructions FROM orders";
$result = $conn->query($sql);

function getStatusBadgeClass($status) {
    switch($status) {
        case 'Completed': return 'bg-success';
        case 'In Progress': return 'bg-warning';
        case 'Canceled': return 'bg-danger';
        default: return 'bg-secondary';
    }
}
?>
<div class="col-12">
  <div class="card recent-sales overflow-auto">
    <div class="card-body">
      <h5 class="card-title">Orders</h5>
      <table class="table table-borderless datatable">
        <thead>
          <tr>
            <th scope="col">Order No:</th>
            <th scope="col">Status</th>
            <th scope="col">Quantity</th>
            <th scope="col">Total Price</th>
            <th scope="col">File</th>
            <th scope="col">Additional Instructions</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
              // Output data of each row
              while($row = $result->fetch_assoc()) {
                  echo "<tr>";
                  echo "<th scope='row'><a href='#'>" . $row["order_number"] . "</a></th>";
                  echo "<td><span class='badge " . getStatusBadgeClass($row["status"]) . "'>" . $row["status"] . "</span></td>";
                  echo "<td>" . $row["quantity"] . "</td>";
                  echo "<td>$" . $row["amount_paid"] . "</td>";
                  echo "<td><a href='/writemyassignment/" . $row["file_path"] . "' download><i class='bi bi-download' aria-hidden='true'></i></a></td>";
                  echo "<td>" . $row["additional_instructions"] . "</td>";
                  echo "</tr>";
              }
          } else {
              echo "<tr><td colspan='6'>No orders found</td></tr>";
          }

          $conn->close();
          ?>
        </tbody>
      </table>
    </div>
  </div>
</div>


  <!-- End Recent Sales -->
</div>
</div><!-- End Left side columns -->
</div>
</section>

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer" class="footer">
    <div class="copyright">
      &copy; Copyright <strong><span>Wise Writers</span></strong>. All Rights Reserved
    </div>
    <div class="credits">
      Designed by <a href="#">Wisedevelopers</a>
    </div>
  </footer><!-- End Footer -->
<!-- Chatbot start here -->
<button class="chatbot__button">
  <span class="material-symbols-outlined">mode_comment</span>
  <span class="material-symbols-outlined">close</span>
</button>
<div class="chatbot">
  <div class="chatbot__header">
      <h3 class="chatbox__title">Chatbot</h3>
      <span class="material-symbols-outlined">close</span>
  </div>
  <ul class="chatbot__box">
      <li class="chatbot__chat incoming">
          <span class="material-symbols-outlined">smart_toy</span>
          <p>Hi there. How can I help you today?</p>
      </li>
  </ul>
  <div class="chatbot__input-box">
      <textarea class="chatbot__textarea" placeholder="Enter a message..." required></textarea>
      <span id="send-btn" class="material-symbols-outlined">send</span>
  </div>
</div>
<!-- Chatbot ends here -->


  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
  <div class="elfsight-app-504db131-d5b3-4e51-a219-5205a5ca018a" data-elfsight-app-lazy></div>
  <!-- Vendor JS Files -->
  <script type="text/javascript" src="../script.js"></script>
  <script src="assets/vendor/apexcharts/apexcharts.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/chart.js/chart.umd.js"></script>
  <script src="assets/vendor/echarts/echarts.min.js"></script>
  <script src="assets/vendor/quill/quill.js"></script>
  <script src="assets/vendor/simple-datatables/simple-datatables.js"></script>
  <script src="assets/vendor/tinymce/tinymce.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <!-- Include jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="admin_script.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>