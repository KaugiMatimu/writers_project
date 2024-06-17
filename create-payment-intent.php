<?php
require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY');

header('Content-Type: application/json');

$input = file_get_contents('php://input');
$data = json_decode($input, true);

$paymentIntent = \Stripe\PaymentIntent::create([
  'amount' => $data['amount'],
  'currency' => 'usd',
  'payment_method' => $data['payment_method'],
  'confirmation_method' => 'manual',
  'confirm' => true,
]);

echo json_encode($paymentIntent);
?>
