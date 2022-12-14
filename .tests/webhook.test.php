<?php

use DevRIFT\DevRIFT;
use DevRIFT\Webhook;

//require_once './DevRIFT.php';
//require_once './Webhook/Webhook.php';

// Set the publisher key and secret key
DevRIFT::setApiKeys("this", "this");

$payload = '{"event":"test_event","data":"test_data"}';
$sigHeader = 't=1603513200, v0=f0b31d2e47f9b9eeccfd0e17e23f5058b5c47ccc826a4f637d4b28e9b9ef9f55';
$secret = 'my_secret';

$event = Webhook::constructEvent($payload, $sigHeader, $secret);
if ($event === false) {
    // Signature is invalid
    echo "invalid";
} else {
    // Signature is valid
    echo "valid";
}
