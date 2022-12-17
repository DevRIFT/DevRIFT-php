<?php

namespace DevRIFT\MFA;

use DevRIFT\DevRIFT;

/**
 * MFA SMS Class
 * 
 * This class is used to create an SMS MFA code.
 */
class MFA
{
    /**
     * Summary of viaSMS
     * @param mixed $phone_number
     * @return bool
     */
    public static function viaSMS($phone_number)
    {
        $phone_number = filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT);

        $data = array(
            'api_type' => 'mfa_create_sms',
            'phone_number' => $phone_number,
            'rift_pk' => DevRIFT::getPublisherKey(),
            'rift_sk' => DevRIFT::getSecretKey()
        );

        if ((new \DevRIFT\ApiRequestor())->request($data) === false) {
            return false;
        }
        return true;
    }
}