<?php
require_once('path_to_stripe_php/init.php'); // Adjust path as needed
\Stripe\Stripe::setApiKey(getenv('STRIPE_SECRET_KEY'));
$token = $_POST['stripeToken'];
try {
  $charge = \Stripe\Charge::create(array(
    'amount' => 999,
    'currency' => 'usd',
    'description' => 'Example charge',
    'source' => $token,
  ));
  echo 'Payment successful!';
} catch (\Stripe\Exception\CardException $e) {
  echo 'Payment failed: ' . $e->getError()->message;
}
