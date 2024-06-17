<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Order Details</title>
  <meta content="" name="description">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@48,400,1,0"
    />
  <!-- smart alert -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.js"></script>
  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">
  <link href="assets/vendor/glightbox/css/glightbox.min.css" rel="stylesheet">
  <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

  <!-- Main CSS File -->
  <link href="assets/css/main.css" rel="stylesheet">
<style>
  .d-flex {
    display: flex;
    align-items: center;
  }
  .btn-primary {
    margin: 0 5px;
  }
  .form-control.pqty {
    width: 60px;
    text-align: center;
  }
  .badge {
    position: absolute;
    top: 5px;
    right: 5px;
    padding: 5px 10px;
    border-radius: 50%;
    background-color: red;
    color: white;
  }
  .profile-container {
     width: 100px;
     height: 100px;
     display: inline-block;
     border-radius: 50%;
     margin-right: 20px;
     overflow: hidden;
     margin: 0 auto;
  }
  .profile-image {
    width: 45%;
    height: 45%;
    object-fit: cover;
  }
  .welcome-text {
    font-size: 20px;
  }
  .navbar {
    background-color: #333;
    color: #fff;
    display: flex;
    align-items: center;
    justify-content: space-between;
    padding: 10px 20px;
  }
      .navmenu ul {
        display: flex;
        align-items: center;
        padding: 0;
    }

    .navmenu ul li {
        list-style-type: none;
        margin-right: 10px;
    }

    .navmenu ul li a {
        text-decoration: none;
        color: #000;
      }
    .navmenu ul li a:hover {
        color: #555;
    }

    .profile-container {
        margin-left: auto;
        display: flex;
        align-items: center;
    }

    .profile-image {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        margin-right: 10px;
    }

    .greeting-container {
        display: flex;
        align-items: center;
    }

    .greeting-container p {
        margin-right: 10px;
    }
    .header {
      background-color: #fff;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 15px 0;
    }

    .logo img {
      height: 40px;
    }

    .navmenu ul {
      list-style: none;
      padding: 0;
      margin: 0;
      display: flex;
      align-items: center;
    }

    .navmenu ul li {
      position: relative;
    }

    .navmenu ul li a {
      padding: 10px 15px;
      display: block;
      color: #333;
      text-decoration: none;
    }

    .navmenu ul li a:hover,
    .navmenu ul li a.active {
      color: #007bff;
    }

    .navmenu ul li .dropdown ul,
    .navmenu ul li .listing-dropdown ul {
      display: none;
      position: absolute;
      background: #fff;
      border: 1px solid #ddd;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      padding: 10px;
      list-style: none;
      margin-top: 10px;
    }

    .navmenu ul li .dropdown:hover ul,
    .navmenu ul li .listing-dropdown:hover ul {
      display: block;
    }

    .navmenu ul li .dropdown ul li a,
    .navmenu ul li .listing-dropdown ul li a {
      padding: 5px 10px;
      white-space: nowrap;
    }

    .notifications {
      width: 300px;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background: #fff;
    }

    .notifications .dropdown-header {
      font-weight: bold;
      font-size: 16px;
      padding: 10px 0;
      border-bottom: 1px solid #ddd;
    }

    .notifications .notification-item {
      display: flex;
      align-items: flex-start;
      padding: 10px 0;
    }

    .notifications .notification-item i {
      font-size: 24px;
      margin-right: 15px;
    }

    .notifications .notification-item h4 {
      font-size: 14px;
      margin: 0 0 5px;
    }

    .notifications .notification-item p {
      font-size: 12px;
      margin: 0;
      color: #666;
    }

    .notifications .dropdown-footer {
      padding: 10px 0;
      text-align: center;
      border-top: 1px solid #ddd;
    }

    .notifications .dropdown-footer a {
      color: #007bff;
      text-decoration: none;
    }

    .notifications .dropdown-divider {
      margin: 0;
    }

    .badge-number {
      font-size: 12px;
      padding: 3px 6px;
    }
    .nav-link.nav-icon i.bi-bell {
      font-size: 28px;
    }
    .bi-chat-left-text{
      font-size: 28px;
    }
    /* message drop down */
    .messages {
      width: 300px;
      padding: 10px;
      border-radius: 5px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      background: #fff;
    }

    .messages .dropdown-header {
      font-weight: bold;
      font-size: 16px;
      padding: 10px 0;
      border-bottom: 1px solid #ddd;
    }

    .message-item {
      display: flex;
      align-items: flex-start;
      padding: 10px 0;
    }

    .message-item img {
      width: 50px;
      height: 50px;
      border-radius: 50%;
      margin-right: 15px;
    }

    .message-item h4 {
      font-size: 14px;
      margin: 0 0 5px;
    }

    .message-item p {
      font-size: 12px;
      margin: 0;
      color: #666;
    }

    .messages .dropdown-footer {
      padding: 10px 0;
      text-align: center;
      border-top: 1px solid #ddd;
    }

    .messages .dropdown-footer a {
      color: #007bff;
      text-decoration: none;
    }

    .messages .dropdown-divider {
      margin: 0;
    }
.message-icon .bi-chat-left-text {
  font-size: 20px;
  position: absolute;
}
/* Icon styles */
.nav-icon {
  position: relative;
  padding: 5px;
  font-size: 1.5rem;
}

.nav-icon .badge-number {
  position: absolute;
  /* top: -5px;
  right: -10px; */
  font-size: 10px;
  padding: 2px 5px;
  border-radius: 50%;
}

.message-icon .badge-number {
  position: absolute;
  top: -5px;
  right: -10px;
  font-size: 0.75rem;
  padding: 2px 5px;
  border-radius: 50%;
}

/* Get Started button */
.btn-getstarted {
  background: #007bff;
  color: #fff;
  padding: 10px 20px;
  border-radius: 5px;
  text-decoration: none;
}

.btn-getstarted:hover {
  background: #0056b3;
  color: #fff;
}
.chat-box {
            max-height: 400px;
            overflow-y: auto;
            border: 1px solid #ccc;
            padding: 10px;
        }
        .chat-input {
            display: flex;
            margin-top: 10px;
        }
        .chat-input textarea {
            flex: 1;
            resize: none;
        }
      
</style>
</head>

<body class="index-page">

<header id="header" class="header d-flex align-items-center fixed-top">
  <div class="container-fluid container-xl position-relative d-flex align-items-center">
    <!-- Logo and site name -->
    <a href="index.html" class="logo d-flex align-items-center me-auto">
      <img src="assets/img/logo.png" alt="">
      <h1 class="sitename">Wise Writers</h1>
    </a>

    <!-- Navigation menu -->
    <nav id="navmenu" class="navmenu">
      <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#services">Services</a></li>
        <li><a href="blog.html">Blog</a></li>

        <!-- Dropdown menu -->
        <li class="dropdown">
          <a href="#"><span>Essay Writing</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul>
            <li><a href="#">Lab Report</a></li>
            <li><a href="#">Online Classes</a></li>
            <li><a href="#">Book Review</a></li>
          </ul>
        </li>

        <!-- Listing dropdown menu -->
        <li class="listing-dropdown">
          <a href="#"><span>Writing Services</span> <i class="bi bi-chevron-down toggle-dropdown"></i></a>
          <ul class="row">
            <li class="col">
              <a href="#">Nursing Essay Writing</a>
              <a href="#">PCOT Essay Writing</a>
              <a href="#">Argumentative Essay</a>
            </li>
            <li class="col">
              <a href="#">Synopses Essay Writing</a>
              <a href="#">Persuasive Essay Writing</a>
              <a href="#">Book Review Writing</a>
            </li>
            <li class="col">
              <a href="#">Movie Review Writing</a>
              <a href="#">Hessi Exams Help</a>
              <a href="#">Honorlock Exams Help</a>
            </li>
            <li class="col">
              <a href="#">Proctored Exams Services</a>
              <a href="#">ProctorU Exam</a>
              <a href="#">Q&A Writing Services</a>
            </li>
            <li class="col">
              <a href="#">Research Paper Writing</a>
              <a href="#">Thesis Writing Services</a>
              <a href="#">Hook Statement Writing</a>
            </li>
          </ul>
        </li>

        <!-- Notification icon -->
        <li class="nav-item dropdown">
          <a class="nav-link nav-icon" href="#" data-bs-toggle="dropdown">
            <i class="bi bi-bell"></i>
            <span class="badge bg-primary badge-number">4</span>
          </a>
          <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow notifications">
            <li class="dropdown-header">
              You have 4 new notifications
              <a href="#"><span class="badge rounded-pill bg-primary p-2 ms-2">View all</span></a>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li class="notification-item">
              <i class="bi bi-exclamation-circle text-warning"></i>
              <div>
                <h4>Hello There</h4>
                <p>Hello to How is the going</p>
                <p>30 min. ago</p>
              </div>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li class="notification-item">
              <i class="bi bi-x-circle text-danger"></i>
              <div>
                <h4>Can you Help handle an urgent nursing order</h4>
                <p>Yes very urgent</p>
                <p>1 hr. ago</p>
              </div>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li class="notification-item">
              <i class="bi bi-check-circle text-success"></i>
              <div>
                <h4>Hey are you capable of handling urgent orders</h4>
                <p>Yes</p>
                <p>2 hrs. ago</p>
              </div>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li class="notification-item">
              <i class="bi bi-info-circle text-primary"></i>
              <div>
                <h4>Dicta reprehenderit</h4>
                <p>Quae dolorem earum veritatis oditseno</p>
                <p>4 hrs. ago</p>
              </div>
            </li>
            <li><hr class="dropdown-divider"></li>
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>
          </ul>
        </li>

        <!-- Authentication links -->
        <li>
          <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php">Logout</a>
          <?php else: ?>
            <!-- <a href="login.php"></a> -->
          <?php endif; ?>
        </li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <!-- Get Started button -->
    <!-- <a class="btn-getstarted flex-md-shrink-0" href="register.php">Get Started</a> -->
  </div>
</header>


  <main class="main">
<body>
<div class="container mt-5">
    <h2 class="text-center mb-4">Orders History</h2>
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Order Number</th>
            <th>Order</th>
            <th>Pages (Quantity)</th>
            <th>Deadline</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        </thead>
        <tbody>
        <?php
        include 'config.php';

        // Fetch data from orders table
        $sql = "SELECT id, order_number, name, quantity, created_at, deadline, status, service FROM orders";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                $orderId = $row['id'];
                $orderNumber = $row['order_number'];
                $orderName = $row['name'];
                $orderService = $row['service'];
                $quantity = $row['quantity'];
                $createdAt = new DateTime($row['created_at']);
                $deadline = new DateTime($row['deadline']);
                $now = new DateTime();
                $interval = $createdAt->diff($deadline);

                // Calculate initial remaining time
                $remainingTime = $deadline->getTimestamp() - $now->getTimestamp();

                if ($now > $deadline && $row['status'] === 'Pending') {
                    $status = 'Past Due';
                } else {
                    $status = $row['status'];
                }

                // Determine the Bootstrap class for the status
                $statusClass = '';
                $textColor = '';
                switch ($status) {
                    case 'Past Due':
                        $statusClass = 'btn btn-danger';
                        $textColor = 'style="color: red;"';
                        break;
                    case 'Completed':
                        $statusClass = 'btn btn-success';
                        break;
                    case 'Pending':
                    default:
                        $statusClass = 'btn btn-warning';
                        break;
                }

                echo "<tr id='order-{$orderId}'>
                        <td>{$orderNumber}</td>
                        <td>{$orderService}</td>
                        <td>{$quantity}</td>
                        <td class='deadline' data-deadline='{$deadline->getTimestamp()}'></td>
                        <td class='status' {$textColor}>{$status}</td>
                        <td>
                            <a href='#' class='btn btn-primary btn-sm edit-btn' data-id='{$orderId}'>Edit</a>
                            <a href='#' class='btn btn-danger btn-sm cancel-btn' data-id='{$orderId}'>Cancel</a>
                            <a href='#' class='btn btn-success btn-sm complete-btn' data-id='{$orderId}'>Mark as Completed</a>
                        </td>
                    </tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center'>No orders found</td></tr>";
        }

        $conn->close();
        ?>
        </tbody>
    </table>
</div>

<!-- Cancel Order Modal -->
<div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="cancelModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cancelModalLabel">Cancel Order</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="cancelForm">
                    <div class="form-group">
                        <label for="cancelReason">Reason for cancellation</label>
                        <textarea class="form-control" id="cancelReason" rows="3" required></textarea>
                    </div>
                    <input type="hidden" id="cancelOrderId">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-danger" id="submitCancel">Cancel Order</button>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        let cancelOrderId;

        // Function to update the countdown for all deadlines
        function updateCountdown() {
            $('.deadline').each(function() {
                const deadlineTimestamp = $(this).data('deadline');
                const now = Math.floor(Date.now() / 1000);
                let remainingTime = deadlineTimestamp - now;

                if (remainingTime <= 0) {
                    $(this).text('Past Due');
                } else {
                    const days = Math.floor(remainingTime / (60 * 60 * 24));
                    remainingTime %= (60 * 60 * 24);
                    const hours = Math.floor(remainingTime / (60 * 60));
                    remainingTime %= (60 * 60);
                    const minutes = Math.floor(remainingTime / 60);

                    $(this).text(`${days} days, ${hours} hours, ${minutes} minutes`);
                }
            });
        }

        // Update the countdown every second
        setInterval(updateCountdown, 1000);

        $('.cancel-btn').click(function() {
            cancelOrderId = $(this).data('id');
            $('#cancelOrderId').val(cancelOrderId);
            $('#cancelModal').modal('show');
        });

        $('#submitCancel').click(function() {
            const reason = $('#cancelReason').val();
            if (reason.trim() === '') {
                alert('Please provide a reason for cancellation.');
                return;
            }

            $.ajax({
                url: 'update_status.php',
                type: 'POST',
                data: { id: cancelOrderId, status: 'Canceled', reason: reason },
                success: function(response) {
                    if (response === 'success') {
                        $('#order-' + cancelOrderId + ' .status').text('Canceled').removeClass().addClass('status btn btn-danger');
                        $('#cancelModal').modal('hide');
                    } else {
                        alert('Failed to update status.');
                    }
                }
            });
        });

        $('.complete-btn').click(function() {
            const orderId = $(this).data('id');
            $.ajax({
                url: 'update_status.php',
                type: 'POST',
                data: { id: orderId, status: 'Completed' },
                success: function(response) {
                    if (response === 'success') {
                        $('#order-' + orderId + ' .status').text('Completed').removeClass().addClass('status btn btn-success');
                    } else {
                        alert('Failed to update status.');
                    }
                }
            });
        });

        // Initial call to display the countdown on page load
        updateCountdown();
    });
</script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
