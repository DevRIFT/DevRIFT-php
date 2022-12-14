<?php

namespace DevRIFT\MFA;

use DevRIFT\DevRIFT;

/**
 * MFA Email Class
 * 
 * This class is used to create an email MFA code.
 */
class MFA
{
    /**
     * Summary of viaEmail
     * @param mixed $email
     * @return bool
     */
    public static function viaEmail($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $data = array(
            'api_type' => 'mfa_create_email',
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