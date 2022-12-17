<?php

namespace DevRIFT\Utilities;

use DevRIFT\Exception\InvalidArgumentException;

/**
 * Utilities Upgrade Phone Class
 * 
 * This class is used to upgrade a phone number to the international format.
 */
class Utilities
{
    /**
     * Summary of upgradePhone
     * @param mixed $phone
     * @return string
     */
    public static function upgradePhone($phone)
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