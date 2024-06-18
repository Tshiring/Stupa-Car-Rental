<?php

require __DIR__ . '/../vendor/autoload.php';

use Dotenv\Dotenv;

// Load environment variables from the .env file
$dotenv = Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();

// Retrieve the Stripe secret key from the environment variables
$stripeSecretKey = $_ENV['STRIPE_SECRET_KEY'] ?? getenv('STRIPE_SECRET_KEY');
if (!$stripeSecretKey) {
  throw new Exception('Stripe secret key not set in environment variables');
}

\Stripe\Stripe::setApiKey($stripeSecretKey);

$checkout_session = \Stripe\Checkout\Session::create([
  "mode" => "payment",
  "success_url" => "http://localhost/success.php",
  "cancel_url" => "http://localhost/Car/docs/booking.php",
  "locale" => "auto",
  "line_items" => [
    [
      "quantity" => 1,
      "price_data" => [
        "currency" => "usd",
        "unit_amount" => 2000,
        "product_data" => [
          "name" => "T-shirt"
        ]
      ]
    ],
    [
      "quantity" => 2,
      "price_data" => [
        "currency" => "usd",
        "unit_amount" => 700,
        "product_data" => [
          "name" => "Hat"
        ]
      ]
    ]
  ]
]);

http_response_code(303);
header("Location: " . $checkout_session->url);
