<?php

use DevRIFT\DevRIFT;
use DevRIFT\Activation\Activation;

require_once './DevRIFT.php';
require_once './Activation/Request.php';
require_once './Activation/Verify.php';

// Set the publisher key and secret key
DevRIFT::setApiKeys("this", "this");

// Usage: Activation::request(USER_EMAIL);
Activation::request('test@nerverift.com');

// Usage: Activation::verify();
$email = Activation::verify()['email'];

// What next?

// You can use $email in an SQL Statement to activate the user
// Example:
// $sql = "UPDATE your_user_table SET your_activated_users_email = 1 WHERE user_emails = '$email'";
// You can also use our SQL class to do this for you