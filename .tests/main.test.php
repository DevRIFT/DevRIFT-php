<?php

require_once dirname(__FILE__) . '/lib/DevRIFT.php';

\DevRIFT\DevRIFT::setApiKeys("KEY", "SECRET");

echo \DevRIFT\DevRIFT::getPublisherKey();