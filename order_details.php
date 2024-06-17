<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Details</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.tiny.cloud/1/i403qlo1q0myamh6arrdinf0w4it6tfmzqhowd2w2kwl3x3q/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <style>
        .custom-file-upload {
            display: inline-block;
            padding: 6px 12px;
            cursor: pointer;
            color: #fff;
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 0.25rem;
            display: flex;
            align-items: center;
        }

        .custom-file-upload i {
            margin-right: 8px;
        }

        .custom-file-upload input[type="file"] {
            display: none;
        }

        .progress {
            height: 1.5rem;
            margin-top: 10px;
        }

        .progress-bar {
            background-color: #007bff;
        }

        .form-group {
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<header id="header" class="header d-flex align-items-center fixed-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">
        <a href="index.html" class="logo d-flex align-items-center me-auto">
            <img src="assets/img/logo.png" alt="">
            <h1 class="sitename">Wise Writers</h1>
        </a>
    </div>
</header>
<main class="main">
    <section id="order-details" class="order-details section">
        <div class="container" data-aos="fade-up">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-center">Order Details</h2>

                    <?php
                    $service = isset($_GET['service']) ? $_GET['service'] : 'Undefined service';
                    $quantity = isset($_GET['quantity']) ? $_GET['quantity'] : 'Undefined quantity';
                    $price = isset($_GET['price']) ? $_GET['price'] : 'Undefined price';
                    ?>
                    <div class="order-summary mb-4">
                        <p><strong>Service:</strong> <?php echo htmlspecialchars($service); ?></p>
                        <p><strong>Quantity:</strong> <?php echo htmlspecialchars($quantity); ?></p>
                        <p><strong>Price:</strong> <?php echo htmlspecialchars($price); ?></p>
                    </div>
                    <form id="order-form" action="submit_order.php" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="service" value="<?php echo htmlspecialchars($service); ?>">
                        <input type="hidden" name="quantity" value="<?php echo htmlspecialchars($quantity); ?>">
                        <div class="form-group">
                            <label for="additional-instructions">Additional Instructions</label>
                            <textarea class="form-control" id="additional-instructions" name="additional_instructions" rows="3" required></textarea>
                        </div>
                        <div class="form-group">
                            <label for="file-upload">Upload Materials</label>
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" id="file-upload" name="file_upload[]" multiple accept=".doc,.docx,.ppt,.pptx,.pdf,.png,.jpeg,.jpg,.zip" onchange="updateFileUploadLabel(this)">
                                <label class="custom-file-label" for="file-upload">Choose files</label>
                            </div>
                            <div class="progress" style="display: none;">
                                <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="deadline">Task Deadline</label>
                            <input type="date" class="form-control" id="deadline" name="deadline" required min="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="form-group">
                            <label for="pmode">Payment Method</label>
                            <select class="form-control" id="pmode" name="pmode" required onchange="togglePaymentFields()">
                                <option value="" disabled selected>Select payment method</option>
                                <option value="PayPal">PayPal</option>
                                <option value="Card">Card</option>
                            </select>
                        </div>
                        <div id="paypal-fields" class="payment-fields" style="display:none;">
                            <div class="form-group">
                                <label for="paypal-email">PayPal Email</label>
                                <input type="email" class="form-control" id="paypal-email" name="paypal_email" placeholder="Enter your PayPal email">
                            </div>
                        </div>
                        <div id="card-fields" class="payment-fields" style="display:none;">
                            <div class="form-group">
                                <label for="card-number">Card Number</label>
                                <input type="text" class="form-control" id="card-number" name="card_number" placeholder="Enter your card number">
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="card-expiry">Expiry Date</label>
                                    <input type="text" class="form-control" id="card-expiry" name="card_expiry" placeholder="MM/YY">
                                </div>
                                <div class="col">
                                    <label for="card-cvc">CVC</label>
                                    <input type="text" class="form-control" id="card-cvc" name="card_cvc" placeholder="CVC">
                                </div>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block mt-4">Submit Order</button>
                    </form>

                    <script>
                        function togglePaymentFields() {
                            var pmode = document.getElementById('pmode').value;
                            document.getElementById('paypal-fields').style.display = (pmode === 'PayPal') ? 'block' : 'none';
                            document.getElementById('card-fields').style.display = (pmode === 'Card') ? 'block' : 'none';
                        }

                        // Update file upload label
                        function updateFileUploadLabel(input) {
                            var files = input.files;
                            var label = input.nextElementSibling;
                            var labelText = 'Choose files';
                            if (files.length === 1) {
                                labelText = files[0].name;
                            } else if (files.length > 1) {
                                labelText = files.length + ' files selected';
                            }
                            label.innerHTML = labelText;
                        }

                        tinymce.init({
                            selector: '#additional-instructions',
                            plugins: 'advlist autolink lists link image charmap print preview hr anchor pagebreak',
                            toolbar_mode: 'floating',
                            menubar: false,
                            toolbar: 'undo redo | formatselect | bold italic backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | removeformat | help'
                        });

                        // Disable past dates in deadline input
                        var today = new Date().toISOString().split('T')[0];
                        document.getElementById('deadline').setAttribute('min', today);
                    </script>

                </div>
            </div>
        </div>
    </section>
</main>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    // File upload progress bar
    document.getElementById('file-upload').addEventListener('change', function () {
        var progressBar = document.querySelector('.progress');
        var progressBarLabel = progressBar.querySelector('.progress-bar');
        var fileInput = document.getElementById('file-upload');
        var files = fileInput.files;

        if (files.length > 0) {
            progressBar.style.display = 'block';
            var formData = new FormData();
            for (var i = 0; i < files.length; i++) {
                formData.append('files[]', files[i]);
            }

            var xhr = new XMLHttpRequest();
            xhr.open('POST', 'upload.php'); // Replace with your upload handling script
            xhr.upload.onprogress = function (event) {
                if (event.lengthComputable) {
                    var percentComplete = (event.loaded / event.total) * 100;
                    progressBarLabel.style.width = percentComplete + '%';
                    progressBarLabel.innerHTML = percentComplete.toFixed(0) + '%';
                }
            };

            xhr.onload = function () {
                progressBar.style.display = 'none';
                progressBarLabel.style.width = '0%';
                progressBarLabel.innerHTML = '0%';
            };

            xhr.send(formData);
        }
    });
</script>
</body>
</html>
