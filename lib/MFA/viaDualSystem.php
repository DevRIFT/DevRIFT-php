<?php

namespace DevRIFT\MFA;

use DevRIFT\DevRIFT;

class MFA
{
    public static function viaDualSystem($phone_number, $email)
    {
        $phone_number = filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $data = array(
            'api_type' => 'mfa_create_dual',
            'phone_number' => $phone_number,
            'email' => $email,
            'rift_pk' => DevRIFT::getPublisherKey(),
            'rift_sk' => DevRIFT::getSecretKey()
        );

        if ((new \DevRIFT\ApiRequestor())->request($data) === false) {
            return false;
        }
        return true;
    }
}