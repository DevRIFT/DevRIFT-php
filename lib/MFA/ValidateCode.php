<?php

namespace DevRIFT\MFA;

use DevRIFT\DevRIFT;

class MFA
{
    public static function validateCode($MfaCode, $user_contact)
    {
        $data = array(
            'api_type' => 'mfa_verify',
            'mfa_code' => $MfaCode,
            'user_contact' => $user_contact,
            'rift_pk' => DevRIFT::getPublisherKey(),
            'rift_sk' => DevRIFT::getSecretKey()
        );

        // Use the ApiRequestor class to send the data to the API
        if ((new \DevRIFT\ApiRequestor())->request($data) === false) {
            return false;
        }
        return true;
    }

}