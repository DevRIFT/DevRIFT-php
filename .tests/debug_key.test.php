<?php

use DevRIFT\DevRIFT;
use DevRIFT\Debug\Debug;

require_once './DevRIFT.php';
require_once './Debug/Debug.php';

// Set the publisher key and secret key
DevRIFT::setApiKeys("this", "this");

// Usage: Debug::keys();
Debug::keys();