<?php

namespace DevRIFT\Utilities;

use DevRIFT\Exception\InvalidArgumentException;

class Utilities
{
    public static function MakePhone($phone)
    {
        $phone = preg_replace('/[^0-9+]/', '', $phone);

        if (strlen($phone) < 2 || $phone[0] !== '+') {
            throw new InvalidArgumentException('The Phone Number provided is not valid.');
        }

        return $phone;
    }
}


/*
use DevRIFT\Utilities;

try {
    $phone_number = Utilities::MakePhone('+1 555-555-5555');
    echo $phone_number; // outputs +15555555555
} catch (InvalidArgumentException $e) {
    echo 'Invalid phone number';
}

*/