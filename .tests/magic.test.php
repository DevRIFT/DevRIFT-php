<?php

use DevRIFT\DevRIFT;
use DevRIFT\Magic\Make;
use DevRIFT\Magic\Verify;

require_once './DevRIFT.php';
require_once './Magic/Make.php';
require_once './Magic/Verify.php';

// Set the publisher key and secret key
DevRIFT::setApiKeys("this", "this");

// Usage: Make::magic(USER_EMAIL);
Make::magic('user@example.com');

// Usage: Verify::magic(USER_EMAIL);
Verify::magic('user@example.com');