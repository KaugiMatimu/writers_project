<?php
session_start();
if (isset($_SESSION['cart'])) {
    echo '';
    echo '';
    foreach ($_SESSION['cart'] as $service => $quantity) {
        echo '<li>' . htmlspecialchars($service) . ': ' . htmlspecialchars($quantity) . '</li>';
    }
    echo '</ul>';
} else {
    echo '<p></p>';
}
// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect to login page if not logged in
    header("Location: login.php");
    exit;
}

// Get current hour
$current_hour = date('G');

// Define greeting message based on current hour
if ($current_hour >= 5 && $current_hour < 12) {
    $greeting = "Good morning";
} elseif ($current_hour >= 12 && $current_hour < 18) {
    $greeting = "Good afternoon";
} else {
    $greeting = "Good evening";
}
// data insertaion starts here
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>Write My Assignment</title>
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
      .smaller-input {
        width: 80px;
        font-size: 0.875rem; 
        padding: 0.25rem; 
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
        <li><a href="#hero" class="active">Home</a></li>
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
         <!-- fetch notification strats here -->

          <!-- fetch notification ends here -->
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
            <li class="dropdown-footer">
              <a href="#">Show all notifications</a>
            </li>
          </ul>
        </li>
        <!-- handle notifications starts here -->
         <!-- handle notifications ends here  -->
        <!-- Authentication links -->
        <li>
          <?php if (isset($_SESSION['user_id'])): ?>
            <a href="logout.php">Logout</a>
          <?php else: ?>
            <a href="login.php">Login</a>
          <?php endif; ?>
        </li>
      </ul>
      <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
    </nav>

    <!-- Get Started button -->
    <a class="btn-getstarted flex-md-shrink-0" href="register.php">Get Started</a>
  </div>
</header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h1 data-aos="fade-up">Refine Your Academic Voice: Where Ideas Take Flight through Words.</h1>
            <p data-aos="fade-up" data-aos-delay="100">This is where academic excellence meets 
              refined expression, empowering scholars to articulate their insights with precision and impact.</p>
              <a href="place_order.php">
              <div>
                <button class="btn btn-primary bi bi-cart">Order Now</button>
              </div>
              </a>
          </div>
          <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-out">
            <img src="assets/img/hero-img.png" class="img-fluid animated" alt="">
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h3>Who We Are</h3>
              <h2>Take Flight through Words.</h2>
              <p>
                TopGradeMasters: Cultivating Academic Brilliance, One Word at a Time." At TopGradeMasters, we're more than just a platform
                for academic writing; we're a community committed to nurturing scholarly excellence. Through our comprehensive
                suite of tools, resources, and expert guidance, we empower students and academics to refine their writing skills,
                articulate their ideas with clarity and precision, and ultimately, make a meaningful impact in their fields of study.
                Join us in our mission to elevate academic discourse and unleash the full potential of your intellectual voice.
              </p>
              <div class="text-center text-lg-start">
                <a href="place_order.php" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Order Now</span>
                  <i class="bi bi-cart"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="assets/img/about.jpg" class="img-fluid" alt="">
          </div>

        </div>
      </div>

    </section><!-- /About Section -->
    <!-- starts here -->
    <section id="pricing" class="pricing section">
  <!-- Section Title -->
  <div class="container section-title" data-aos="fade-up">
    <h2>Our Services</h2>
    <p>Check Our Affordable Pricing<br></p>
  </div><!-- End Section Title -->
  
  <div class="container">
    <div class="row gy-2">
    <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="100">
    <div class="pricing-tem">
        <h3 style="color: #20c997;">Essay Writing</h3>
        <p>Unlock the Power of Persuasion with Our Essay Writing Services. Crafting compelling essays requires a delicate blend of research, analysis, and eloquent expression. At our essay writing service, we understand the importance of delivering impeccably written essays that not only meet academic standards but also captivate and persuade readers.</p>
        <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'essay')">-</button>
                <input type="number" name="quantity" class="form-control pqty" value="1" min="1" onchange="updatePrice('essay')">
                <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'essay')">+</button>
            </div>
        </div>
        <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-essay" value="$10" readonly>
        </div>
        <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Essay Writing">
            <input type="hidden" name="quantity" class="quantity-input quantity-essay" value="1">
            <input type="hidden" name="price" class="price-input price-essay" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
        </form>
    </div>
</div>

<div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="200">
    <div class="pricing-tem">
        <h3 style="color: #0dcaf0;">Hessi Exams</h3>
        <p>Excel in Your HESSI Exam with Our Expert Services. Our dedicated team specializes in providing comprehensive support tailored to help you succeed in the HESSI exam. From personalized study plans to targeted practice sessions, we offer a range of services designed to boost your confidence and performance on test day.</p>
        <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'hessi')">-</button>
                <input type="number" name="quantity" class="form-control pqty" value="1" min="1" onchange="updatePrice('hessi')">
                <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'hessi')">+</button>
            </div>
        </div>
        <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-hessi" value="$10" readonly>
        </div>
        <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Hessi Exams">
            <input type="hidden" name="quantity" class="quantity-input quantity-hessi" value="1">
            <input type="hidden" name="price" class="price-input price-hessi" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
        </form>
    </div>
</div>

<div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="300">
    <div class="pricing-tem">
        <h3 style="color: #fd7e14;">Proctored Exams</h3>
        <p>Ensure Success in Your Proctored Exams with Our Professional Assistance. Our dedicated team specializes in providing reliable and secure writing services tailored to help you excel in your proctored exams. With years of experience and a commitment to academic integrity, we offer personalized support to ensure that your exam essays meet the highest standards of quality and authenticity.</p>
        <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'proctored')">-</button>
                <input type="number" name="quantity" class="form-control pqty" value="1" min="1" onchange="updatePrice('proctored')">
                <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'proctored')">+</button>
            </div>
        </div>
        <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-proctored" value="$10" readonly>
        </div>
        <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Proctored Exams">
            <input type="hidden" name="quantity" class="quantity-input quantity-proctored" value="1">
            <input type="hidden" name="price" class="price-input price-proctored" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
        </form>
    </div>
</div>
<div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="400">
        <div class="pricing-tem">
          <h3 style="color: #0d6efd;">ProctorU Exam</h3>
          <p>Maximize your ProctorU exam success with our specialized essay writing services. Our team of experienced writers ensures top-notch performance in your exams, providing tailored support for all your essay requirements, while adhering to strict academic integrity standards. Trust us to elevate your ProctorU experience and achieve your academic goals seamlessly.</p>
          <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'proctoredU')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1" onchange="updatePrice(this)">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'proctoredU')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-proctoredU" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="ProctorU Exam">
            <input type="hidden" name="quantity" class="quantity-input quantity-proctoredU" value="1">
            <input type="hidden" name="price" class="price-input price-proctoredU" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div>

  <div class="container">
    <div class="row gy-2">
      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="100">
        <div class="pricing-tem">
          <h3 style="color: #20c997;">Business Plan</h3>
          <p>Welcome to ProWrite Solutions, where we cater to all your writing needs with precision and expertise. Our Business Plan service is designed to equip entrepreneurs and startups with comprehensive strategies to navigate the competitive market landscape successfully. From market analysis to financial projections, our expert consultants work closely with clients to develop tailored plans that outline clear objectives and actionable steps for growth.</p>
          <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'business-plan')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'business-plan')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-business-plan" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Business Plan">
            <input type="hidden" name="quantity" class="quantity-input quantity-business-plan" value="1">
            <input type="hidden" name="price" class="price-input price-business-plan" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="200">
        <div class="pricing-tem">
          <h3 style="color: #0dcaf0;">Dissertation Writing</h3>
          <p>Our Dissertation Writing service, we recognize the significance of this academic endeavor. Our seasoned team of writers specializes in providing personalized support to doctoral candidates, guiding them through every stage of the dissertation process. From crafting research proposals to editing final drafts, we ensure scholarly rigor and originality are upheld, resulting in impactful contributions to the academic community.</p>
          <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'dissertation-writing')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'dissertation-writing')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-dissertation-writing" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Dissertation Writing">
            <input type="hidden" name="quantity" class="quantity-input quantity-dissertation-writing" value="1">
            <input type="hidden" name="price" class="price-input price-dissertation-writing" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="300">
        <div class="pricing-tem">
          <h3 style="color: #fd7e14;">Research Paper Writing</h3>
          <p>For those seeking assistance with Research Paper Writing, our dedicated team of researchers and writers is here to help. With a commitment to thorough analysis and meticulous attention to detail, we deliver papers that not only meet but exceed academic standards. Whether it's conducting in-depth literature reviews or crafting compelling arguments, we guarantee high-quality research papers that showcase your expertise and insight.</p>
          <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'research-paper')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'research-paper')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-research-paper" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Research Paper Writing">
            <input type="hidden" name="quantity" class="quantity-input quantity-research-paper" value="1">
            <input type="hidden" name="price" class="price-input price-research-paper" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div><!-- End Pricing Item -->

      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="400">
        <div class="pricing-tem">
          <h3 style="color: #0d6efd;">Speech Writing</h3>
          <p>Our Speech Writing service is tailored to help individuals deliver memorable and persuasive presentations for any occasion. Whether it's a graduation ceremony, corporate event, or TED talk, our experienced speechwriters craft engaging and impactful speeches that resonate with audiences. From captivating openings to powerful conclusions, we ensure your message is delivered with clarity, confidence, and conviction.</p>
          <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'speech-writing')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'speech-writing')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-speech-writing" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Speech Writing">
            <input type="hidden" name="quantity" class="quantity-input quantity-speech-writing" value="1">
            <input type="hidden" name="price" class="price-input price-speech-writing" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div>
      <!-- enter here -->
      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="100">
        <div class="pricing-tem">
          <h3 style="color: #20c997;">Engineering</h3>
          <p>Our Engineering service is tailored to assist students and professionals alike in tackling the complexities of engineering assignments and projects. From structural analysis to mechanical design, our team of engineering experts provides comprehensive solutions that adhere to industry standards and best practices. Whether you need assistance with CAD modeling, circuit analysis, or thermodynamics problems, we're here to help you navigate the challenges of engineering coursework with confidence and proficiency.</p>
          <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'engineering')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'engineering')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-engineering" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Engineering">
            <input type="hidden" name="quantity" class="quantity-input quantity-engineering" value="1">
            <input type="hidden" name="price" class="price-input price-engineering" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div>
      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="200">
        <div class="pricing-tem">
          <h3 style="color: #0dcaf0;">Computer Science</h3>
          <p>Our Computer Science service is designed to support students and professionals in mastering the intricacies of programming languages, algorithms, and software development. With a team of experienced coders and software engineers, we offer personalized assistance in tackling coding assignments, debugging code, and developing scalable software solutions. Whether you're a beginner learning the fundamentals or an experienced programmer diving into advanced topics, we provide the expertise and guidance you need to excel in the dynamic field of computer science.</p>
          <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'computer-science')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'computer-science')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-computer-science" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Computer Science">
            <input type="hidden" name="quantity" class="quantity-input quantity-computer-science" value="1">
            <input type="hidden" name="price" class="price-input price-computer-science" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div>
      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="300">
        <div class="pricing-tem">
          <h3 style="color: #fd7e14;">Math</h3>
          <p>Our Math service is dedicated to helping students unlock the potential of mathematical concepts and problem-solving skills. From algebraic equations to calculus derivatives, our team of math enthusiasts offers tailored support to address your specific needs and challenges. Whether you're preparing for exams, struggling with homework assignments, or exploring advanced mathematical theories, we provide clear explanations, step-by-step solutions, and practical tips to enhance your understanding and confidence in math.</p>
          <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'math')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'math')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-math" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Math">
            <input type="hidden" name="quantity" class="quantity-input quantity-math" value="1">
            <input type="hidden" name="price" class="price-input price-math" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div>
      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="400">
        <div class="pricing-tem">
          <h3 style="color: #0d6efd;">Online Exams</h3>
          <p>Our Online Exams service is designed to support students in preparing for and excelling in online exams across various subjects and disciplines. With a focus on accessibility, security, and convenience, we offer a range of resources and strategies to help you succeed in virtual exam environments. Whether you're facing timed quizzes, proctored exams, or open-book assessments, we provide guidance on effective study techniques, time management strategies, and test-taking tips to optimize your performance and achieve your academic goals.</p>
        <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'online-exam')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'online-exam')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-online-exam" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Online Exams">
            <input type="hidden" name="quantity" class="quantity-input quantity-online-exam" value="1">
            <input type="hidden" name="price" class="price-input price-online-exam" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div>
      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="100">
            <div class="pricing-tem">
              <h3 style="color: #20c997;">Business Plan</h3>
                <p>Welcome to ProWrite Solutions, where we cater to all your writing needs with precision and expertise. Our Business Plan service is designed to equip entrepreneurs and startups with comprehensive strategies to navigate the competitive market landscape successfully. From market analysis to financial projections, our expert consultants work
                     closely with clients to develop tailored plans that outline clear objectives and actionable steps for growth</p>
            <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'business-plan')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'business-plan')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-business-plan" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Business Plan">
            <input type="hidden" name="quantity" class="quantity-input quantity-business-plan" value="1">
            <input type="hidden" name="price" class="price-input price-business-plan" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
    </div>
      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="200">
            <div class="pricing-tem">
              <h3 style="color: #0dcaf0;">Proofreading and Editing</h3>
              <p>Our Proofreading and Editing Writing service, we recognize the significance of this academic endeavor. Our seasoned team of
                     writers specializes in providing personalized support to doctoral candidates, guiding them throug
                     every stage of the Editing and proofreading process. From crafting research proposals to editing final drafts, we ensure
                      scholarly rigor and originality are upheld, resulting in impactful contributions to the academic community</p>
              <div class="col-md-12 py-1 pl-4">
              <b>Pages: </b>
              <div class="d-flex align-items-center">
                <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'proofreading')">-</button>
                <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
                <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'proofreading')">+</button>
              </div>
            </div>
            <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-proofreading" value="$10" readonly>
          </div>
            <form action="order_details.php" method="GET">
              <input type="hidden" name="service" value="proofreading and editing">
              <input type="hidden" name="quantity" class="quantity-input quantity-proofreading" value="1">
              <input type="hidden" name="price" class="price-input price-proofreading" value="10">
              <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
            </form>
        </div>
        </div>
          <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="pricing-tem">
                  <h3 style="color: #fd7e14;">Book Summary Writing</h3>
                  <p>For those seeking assistance with book summary writing, our dedicated team of researchers
                     and writers is here to help. With a commitment to thorough analysis and meticulous attention to detail, 
                     we deliver papers that not only meet but exceed academic standards. Whether it's conducting in-depth literature
                      reviews or crafting compelling arguments,
                    we guarantee high-quality book summary writinng papers that showcase your expertise and insight.</p>
                  <div class="col-md-12 py-1 pl-4">
                    <b>Pages: </b>
                    <div class="d-flex align-items-center">
                      <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'book-summary')">-</button>
                      <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
                      <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'book-summary')">+</button>
                    </div>
                  </div>
                  <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-book-summary" value="$10" readonly>
          </div>
                  <form action="order_details.php" method="GET">
                    <input type="hidden" name="service" value="Book summary writing">
                    <input type="hidden" name="quantity" class="quantity-input quantity-book-summary" value="1">
                    <input type="hidden" name="price" class="price-input price-book-summary" value="10">
                    <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
                  </form>
                </div>
              </div>
            <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                <div class="pricing-tem">
                  <h3 style="color: #0d6efd;">Movie Review</h3>
                  <p>Our movie review service is tailored to help individuals deliver memorable and persuasive presentations for
                     any occasion. Whether it's a graduation ceremony, corporate event, or TED talk, our experienced movie review writers 
                     craft engaging and impactful papers that resonate with audiences. From captivating 
                    openings to powerful conclusions, we ensure your message is delivered with clarity, confidence, and conviction.</p>
            <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'movie-review')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'movie-review')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-movie-review" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Movie Review">
            <input type="hidden" name="quantity" class="quantity-input quantity-movie-review" value="1">
            <input type="hidden" name="price" class="price-input price-movie-review" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div>
      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="100">
                <div class="pricing-tem">
                  <h3 style="color: #20c997;">Nursing Diagnosis</h3>
                  <p>Nursing diagnosis essay writing services offer specialized assistance to nursing students and professionals in crafting detailed and accurate essays on nursing diagnoses. These services provide expert guidance on the formulation of nursing diagnoses based on patient assessment data, ensuring essays are well-structured, evidence-based, and aligned with the latest nursing standards and terminologies. By leveraging the expertise of experienced nursing writers, these services help clients articulate their clinical reasoning, integrate theoretical knowledge with practical application, and produce high-quality essays that meet academic and professional requirements. This support is invaluable for those aiming to excel in their nursing studies and practice.</p>
            <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'nursing-diagnosis')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'nursing-diagnosis')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-nursing-diagnosis" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Nursing Diagnosis">
            <input type="hidden" name="quantity" class="quantity-input quantity-nursing-diagnosis" value="1">
            <input type="hidden" name="price" class="price-input price-nursing-diagnosis" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
        </div>
      </div>
      <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="200">
                <div class="pricing-tem">
                  <h3 style="color: #0dcaf0;">Nursing Evidence Practice</h3>
                  <p>Nursing Evidence-Based Practice (EBP) involves the integration of the best available research evidence with clinical expertise and patient values to make informed decisions about patient care. EBP aims to improve patient outcomes by applying scientifically validated methods and treatments in clinical practice. It requires nurses to stay updated with the latest research, critically appraise studies, and implement changes based on solid evidence. This approach fosters a culture of continuous learning and quality improvement in healthcare, ensuring that nursing practices are effective, efficient, and aligned with the most current standards of care.</p>
            <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'ebp')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'ebp')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-ebp" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Nursing Evidence Based Practice">
            <input type="hidden" name="quantity" class="quantity-input quantity-ebp" value="1">
            <input type="hidden" name="price" class="price-input price-ebp" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="300">
                <div class="pricing-tem">
                  <h3 style="color: #fd7e14;">Critical Essay Writing</h3>
                  <p>Critical Essay Writing services provide specialized support for students and professionals needing 
                    assistance with critical essay writing content. These services range from tutoring and homework help 
                    to writing and editing research papers, theses, and technical documents involving complex
                     critical essay concepts. They cater to diverse needs, ensuring clarity, precision, and proper
                      formatting of critical essays. By leveraging the expertise of critical essay writing
                       and educators, critical essay writing services help clients improve their understanding,
                        enhance their 
                       academic performance, and effectively communicate their ideas.</p>
            <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'critical-essay')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'critical-essay')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-critical-essay" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Math">
            <input type="hidden" name="quantity" class="quantity-input quantity-critical-essay" value="1">
            <input type="hidden" name="price" class="price-input price-critical-essay" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
          </div>
        </div>
        <div class="col-lg-3 col-md-6" data-aos="zoom-in" data-aos-delay="400">
                <div class="pricing-tem">
                  <h3 style="color: #0d6efd;">Book Review</h3>
                  <p>A book review is a critical evaluation of a book, summarizing its content, themes, and significance while providing an analysis of its strengths and weaknesses. It offers readers an insight into the book's quality and relevance, helping them decide whether it's worth their time. Reviews often reflect the reviewer's personal response and can vary widely in tone, from enthusiastic endorsement to constructive criticism.</p>
            <div class="col-md-12 py-1 pl-4">
            <b>Pages: </b>
            <div class="d-flex align-items-center">
              <button type="button" class="btn btn-primary" onclick="decreaseQuantity(this, 'book-review')">-</button>
              <input type="number" name="quantity" class="form-control pqty" value="1" min="1">
              <button type="button" class="btn btn-primary" onclick="increaseQuantity(this, 'book-review')">+</button>
            </div>
          </div>
          <div class="col-md-12 py-1 pl-4">
            <b>Price: </b>
            $<input type="text" name="price" class="form-control price smaller-input price-book-review" value="$10" readonly>
          </div>
          <form action="order_details.php" method="GET">
            <input type="hidden" name="service" value="Book Review">
            <input type="hidden" name="quantity" class="quantity-input quantity-book-review" value="1">
            <input type="hidden" name="price" class="price-input price-book-review" value="10">
            <button type="submit" class="btn-buy">Order Now <i class="bi bi-cart"></i></button>
          </form>
          </div>
        </div>
      <!-- finish here  -->
      <!-- End Pricing Item -->
    </div><!-- End pricing row -->
  </div>
</section><!-- /Pricing Section -->
   <!-- script -->
    <script>
      function increaseQuantity(button, service) {
    var input = button.previousElementSibling;
    input.value = parseInt(input.value) + 1;
    document.querySelector(`.quantity-input.quantity-${service}`).value = input.value;
    updatePrice(service);
}

function decreaseQuantity(button, service) {
    var input = button.nextElementSibling;
    if (parseInt(input.value) > 1) {
        input.value = parseInt(input.value) - 1;
        document.querySelector(`.quantity-input.quantity-${service}`).value = input.value;
        updatePrice(service);
    }
}

function updatePrice(service) {
    var quantity = document.querySelector(`.quantity-${service}`).value;
    var price = quantity * 10; // Assuming $10 per page
    document.querySelector(`.price-${service}`).value = `$${price}`;
    document.querySelector(`.price-input.price-${service}`).value = price;
}

document.addEventListener('DOMContentLoaded', function() {
    var priceInputs = document.querySelectorAll('.price');
    priceInputs.forEach(function(priceInput) {
        if (priceInput) {
            priceInput.value = '$' + priceInput.value.replace(/^\$/, '');
        }
    });
});

    </script>
    <!-- script ends here -->
    <!-- Values Section -->
    <section id="values" class="values section">
    <!-- Stats Section -->
    <section id="stats" class="stats section">

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-emoji-smile color-blue flex-shrink-0"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                <p>Happy Clients</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-journal-richtext color-orange flex-shrink-0" style="color: #ee6c20;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                <p>Projects</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-headset color-green flex-shrink-0" style="color: #15be56;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="1463" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hours Of Support</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

          <div class="col-lg-3 col-md-6">
            <div class="stats-item d-flex align-items-center w-100 h-100">
              <i class="bi bi-people color-pink flex-shrink-0" style="color: #bb0852;"></i>
              <div>
                <span data-purecounter-start="0" data-purecounter-end="15" data-purecounter-duration="1" class="purecounter"></span>
                <p>Hard Workers</p>
              </div>
            </div>
          </div><!-- End Stats Item -->

        </div>

      </div>

    </section><!-- /Stats Section -->

    <!-- Faq Section -->
    <section id="faq" class="faq section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>F.A.Q</h2>
        <p>Frequently Asked Questions</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row">

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="100">

            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>How does your Engineering service work?</h3>
                <div class="faq-content">
                  <p>Our Engineering service provides personalized assistance to students and professionals facing challenges
                     in their engineering coursework or projects. Simply submit your requirements, and our team of experts will
                      review the task, provide guidance, and deliver solutions tailored to your specific needs. Whether you're 
                      struggling with a mechanical design problem or seeking assistance with structural
                     analysis, we're here to help you navigate the complexities of engineering with confidence.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>What programming languages do you cover in your Computer Science service?</h3>
                <div class="faq-content">
                  <p>Our Computer Science service covers a wide range of programming languages, including but not limited to Python, 
                    Java, C++, JavaScript, and more. Whether you're working on introductory programming assignments or advanced
                     software development projects, our team of experienced coders and software 
                    engineers has the expertise to assist you with any language-specific challenges you may encounter.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Can you help me with advanced mathematical concepts in your Math service?</h3>
                <div class="faq-content">
                  <p>Absolutely! Our Math service is designed to cater to students at all levels, from elementary school to
                     graduate-level mathematics. Whether you need assistance with basic arithmetic, algebra, calculus, or 
                     advanced mathematical theories, our team of math enthusiasts is here to provide clear explanations, 
                    step-by-step solutions, and practical guidance to help you master even the most challenging mathematical concepts</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div><!-- End Faq Column-->

          <div class="col-lg-6" data-aos="fade-up" data-aos-delay="200">

            <div class="faq-container">

              <div class="faq-item">
                <h3>How do you ensure the security of online exams in your Online Exams service?</h3>
                <div class="faq-content">
                  <p>We take the security and integrity of online exams very seriously. Our Online Exams service adheres to strict 
                    guidelines and protocols to ensure the authenticity and fairness of assessments. We utilize secure testing 
                    platforms, implement proctoring services, and enforce strict academic integrity policies to prevent cheating
                     and uphold the credibility of online exams.
                     Rest assured, your exam experience with us will be reliable, secure, and conducted with the utmost professionalism.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3> What are your turnaround times for delivering assistance in the various services?</h3>
                <div class="faq-content">
                  <p>Our turnaround times vary depending on the complexity and scope of the task. For most assignments and 
                    projects, we strive to deliver solutions within a reasonable timeframe to accommodate your deadlines. 
                    However, we recommend submitting your requests well in advance to ensure ample time for review, revisions,
                     and any additional assistance you may require. 
                    Rest assured, we prioritize efficiency without compromising the quality of our services.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>Can I communicate directly with the experts providing assistance in your services?</h3>
                <div class="faq-content">
                  <p>Absolutely! We encourage direct communication between our clients and the experts providing assistance 
                    in our services. Once you submit your request, you'll have the opportunity to communicate with our team via
                     email, messaging platforms, or even scheduled consultations. This ensures that your questions are addressed 
                    promptly, and you have the opportunity to clarify any doubts or concerns you may have throughout the process.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div><!-- End Faq Column-->

        </div>

      </div>

    </section><!-- /Faq Section -->
    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Testimonials</h2>
        <p>What they are saying about us<br></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 1
                }
              }
            }
          </script>
          <div class="swiper-wrapper">

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus. Accusantium quam, ultricies eget id, aliquam eget nibh et. Maecen aliquam, risus at semper.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-1.jpg" class="testimonial-img" alt="">
                  <h3>Saul Goodman</h3>
                  <h4>Ceo &amp; Founder</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Export tempor illum tamen malis malis eram quae irure esse labore quem cillum quid cillum eram malis quorum velit fore eram velit sunt aliqua noster fugiat irure amet legam anim culpa.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-2.jpg" class="testimonial-img" alt="">
                  <h3>Sara Wilsson</h3>
                  <h4>Designer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Enim nisi quem export duis labore cillum quae magna enim sint quorum nulla quem veniam duis minim tempor labore quem eram duis noster aute amet eram fore quis sint minim.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-3.jpg" class="testimonial-img" alt="">
                  <h3>Jena Karlis</h3>
                  <h4>Store Owner</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Fugiat enim eram quae cillum dolore dolor amet nulla culpa multos export minim fugiat minim velit minim dolor enim duis veniam ipsum anim magna sunt elit fore quem dolore labore illum veniam.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-4.jpg" class="testimonial-img" alt="">
                  <h3>Matt Brandon</h3>
                  <h4>Freelancer</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

            <div class="swiper-slide">
              <div class="testimonial-item">
                <div class="stars">
                  <i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i><i class="bi bi-star-fill"></i>
                </div>
                <p>
                  Quis quorum aliqua sint quem legam fore sunt eram irure aliqua veniam tempor noster veniam enim culpa labore duis sunt culpa nulla illum cillum fugiat legam esse veniam culpa fore nisi cillum quid.
                </p>
                <div class="profile mt-auto">
                  <img src="assets/img/testimonials/testimonials-5.jpg" class="testimonial-img" alt="">
                  <h3>John Larson</h3>
                  <h4>Entrepreneur</h4>
                </div>
              </div>
            </div><!-- End testimonial item -->

          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Testimonials Section -->
    <!-- Clients Section -->
    <section id="clients" class="clients section">
    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p>Contact Us</p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>A108 Adam Street</p>
                  <p>New York, NY 535022</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+1 5589 55488 55</p>
                  <p>+1 6678 254445 41</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>info@example.com</p>
                  <p>contact@example.com</p>
                </div>
              </div><!-- End Info Item -->
            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Subscribe to our newsletter and receive the latest news about our products and services!</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">FlexStart</span>
          </a>
          <div class="footer-contact pt-3">
            <p>A108 Adam Street</p>
            <p>New York, NY 535022</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+1 5589 55488 55</span></p>
            <p><strong>Email:</strong> <span>info@example.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">About us</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Services</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Terms of service</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Our Services</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Essay Writing</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Online Exam Help</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Homework Help</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Speech Writing</a></li>
          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <div class="social-links d-flex">
            <a href=""><i class="bi bi-twitter-x"></i></a>
            <a href=""><i class="bi bi-facebook"></i></a>
            <a href=""><i class="bi bi-instagram"></i></a>
            <a href=""><i class="bi bi-linkedin"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">TopGradeMasters</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        Designed by <a href="#">@wisedevelopers</a>
      </div>
    </div>

  </footer>
<!-- Chatbot HTML here -->
<button class="chatbot__button">
    <span class="material-symbols-outlined">mode_comment</span>
    <span class="material-symbols-outlined">close</span>
  </button>
  <div class="chatbot">
    <div class="chatbot__header">
      <h3 class="chatbox__title">Chatbot</h3>
      <span class="material-symbols-outlined">close</span>
    </div>
    <ul class="chatbot__box"></ul>
    <div class="chatbot__input-box">
      <textarea class="chatbot__textarea" placeholder="Enter a message..." required></textarea>
      <span id="send-btn" class="material-symbols-outlined">send</span>
    </div>
  </div>

<!-- chatbot ends here -->

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
  <script src="https://static.elfsight.com/platform/platform.js" data-use-service-core defer></script>
<div class="elfsight-app-504db131-d5b3-4e51-a219-5205a5ca018a" data-elfsight-app-lazy></div>
  <!-- Vendor JS Files -->
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>
  <script src="assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="assets/vendor/purecounter/purecounter_vanilla.js"></script>
  <script src="assets/vendor/imagesloaded/imagesloaded.pkgd.min.js"></script>
  <script src="assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script type="text/javascript">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="user_script.js"></script>
  function updateCartBadge() {
    var xhr = new XMLHttpRequest();
    xhr.open('GET', 'get_cart_count.php', true);
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var cartCount = xhr.responseText;
        document.getElementById('cart-badge').textContent = cartCount;
      }
    };
    xhr.send();
  }

  function increaseQuantity(button) {
    var input = button.parentElement.querySelector('input[type="number"]');
    input.value = parseInt(input.value) + 1;
  }

  function decreaseQuantity(button) {
    var input = button.parentElement.querySelector('input[type="number"]');
    if (input.value > 1) {
      input.value = parseInt(input.value) - 1;
    }
  }

  function addToCart(button, serviceName) {
    var quantity = button.parentElement.querySelector('input[type="number"]').value;
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'add_to_cart.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (xhr.readyState == 4 && xhr.status == 200) {
        var response = JSON.parse(xhr.responseText);
        if (response.error) {
          Swal.fire({
            title: 'Error',
            text: response.error,
            icon: 'error'
          }).then(function() {
            window.location.href = 'login.php';
          });
        } else {
          updateCartBadge();
          Swal.fire({
            title: 'Added to Cart',
            text: 'Service: ' + serviceName + '\nQuantity: ' + response[serviceName],
            icon: 'success'
          });
        }
      }
    };
    xhr.send('service=' + serviceName + '&quantity=' + quantity);
  }

  window.onload = function() {
    updateCartBadge();
  };
</script>

  <!-- Main JS File -->
  <script src="assets/js/main.js"></script>
  <script src="script.js"></script>
</body>

</html>