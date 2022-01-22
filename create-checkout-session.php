<?php
require_once('stripe-php-master/init.php');
$config_data = json_decode(file_get_contents("config.json"), true);
\Stripe\Stripe::setApiKey($config_data["api-key"]);

header('Content-Type: application/json');

$checkout_session = \Stripe\Checkout\Session::create([
  'line_items' => [[
    'price' => $config_data["price-id"],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
    'success_url' => $config_data["domain"] . '/success.html',
    'cancel_url' => $config_data["domain"] . '/cancel.html',
]);

header("HTTP/1.1 303 See Other");
header("Location: " . $checkout_session->url);