<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PayPal Payment</title>
    <script src="https://www.paypal.com/sdk/js?client-id=YOUR_PAYPAL_CLIENT_ID&currency=USD"></script>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .payment-container {
            background-color: #ffffff;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 400px;
            width: 100%;
        }
        .payment-container h1 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #333333;
        }
        .form-group {
            margin-bottom: 1rem;
            text-align: left;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: bold;
        }
        .form-group input[type="text"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 0.5rem;
            border: 1px solid #ced4da;
            border-radius: 4px;
        }
        .paypal-button-container {
            margin-top: 1.5rem;
        }
        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #888888;
        }
        .btn-process-payment {
            background-color: #007bff;
            color: #ffffff;
            border: none;
            padding: 0.75rem 2rem;
            border-radius: 4px;
            cursor: pointer;
            font-size: 1rem;
            margin-top: 1rem;
        }
        .btn-process-payment:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1>Complete Your Payment</h1>
        <form id="payment-form">
            <div class="form-group">
                <label for="email">Email Address</label>
                <input type="email" id="email" name="email" required>
            </div>
            <button type="button" class="btn-process-payment" id="btn-process-payment">Process Payment</button>
            <div class="paypal-button-container" id="paypal-button-container"></div>
        </form>
        <div class="footer">
            <p>Your payment is secure and encrypted.</p>
        </div>
    </div>
    <script>
        var isPayPalReady = false;
        var paypalButtons = null;

        // Initialize PayPal buttons
        paypal.Buttons({
            createOrder: function(data, actions) {
                return actions.order.create({
                    purchase_units: [{
                        amount: {
                            value: '10.00' // Set the total order amount here
                        }
                    }]
                });
            },
            onApprove: function(data, actions) {
                return actions.order.capture().then(function(details) {
                    alert('Transaction completed by ' + details.payer.name.given_name);
                    window.location.href = 'submit_order.php';
                });
            }
        }).then(function(buttons) {
            paypalButtons = buttons;
            isPayPalReady = true;
            document.getElementById('btn-process-payment').disabled = false; // Enable process payment button
        });

        // Add event listener for process payment button
        document.getElementById('btn-process-payment').addEventListener('click', function() {
            if (!isPayPalReady || !paypalButtons) {
                alert('PayPal integration is not ready yet. Please try again later.');
                return;
            }
            paypalButtons.render('#paypal-button-container'); // Render PayPal buttons
            paypalButtons.click(); // Trigger PayPal button click to initiate payment
        });
    </script>
</body>
</html>
