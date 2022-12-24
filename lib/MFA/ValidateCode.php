<?php

namespace DevRIFT\MFA;

use DevRIFT\DevRIFT;

/**
 * MFA Verify Class
 * 
 * This class is used to validate a user's MFA code.
 */
class MFA
{
    /**
     * Summary of validateCode
     * @param mixed $MfaCode
     * @param mixed $user_contact
     * @return bool
     */
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
        if ((new \DevRIFT\ApiRequestor())->request($data) === true) {
            return true;
        }
        return false;
    }

}