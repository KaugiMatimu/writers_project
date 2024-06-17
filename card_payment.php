<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Card Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
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
            width: 100%;
            max-width: 400px;
        }
        .payment-container h1 {
            margin-bottom: 1rem;
            font-size: 1.5rem;
            color: #333333;
        }
        #card-element {
            margin: 1rem 0;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        #submit-button {
            background-color: #28a745;
            color: #ffffff;
            border: none;
            padding: 0.75rem 1.5rem;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        #submit-button:hover {
            background-color: #218838;
        }
        .footer {
            margin-top: 2rem;
            font-size: 0.875rem;
            color: #888888;
        }
    </style>
</head>
<body>
    <div class="payment-container">
        <h1>Complete Your Payment</h1>
        <p>Please enter your card details to complete your payment.</p>
        <form id="payment-form">
            <div id="card-element"></div>
            <button id="submit-button">Submit Payment</button>
        </form>
        <div class="footer">
            <p>Your payment is secure and encrypted.</p>
        </div>
    </div>
    <script>
        var stripe = Stripe('YOUR_STRIPE_PUBLIC_KEY');
        var elements = stripe.elements();
        var card = elements.create('card');
        card.mount('#card-element');

        var form = document.getElementById('payment-form');
        form.addEventListener('submit', function(event) {
            event.preventDefault();
            stripe.createPaymentMethod('card', card).then(function(result) {
                if (result.error) {
                    console.error(result.error.message);
                } else {
                    fetch('submit_order.php', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({
                            payment_method_id: result.paymentMethod.id
                        })
                    }).then(function(response) {
                        return response.json();
                    }).then(function(paymentResult) {
                        if (paymentResult.error) {
                            console.error(paymentResult.error);
                        } else {
                            alert('Payment successful!');
                            window.location.href = 'submit_order.php';
                        }
                    });
                }
            });
        });
    </script>
</body>
</html>
