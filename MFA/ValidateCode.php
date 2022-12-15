<?php

namespace DevRIFT\MFA;

use DevRIFT\DevRIFT;

class MFA
{
    protected $publisherKey;

    protected $secretKey;

    public function __construct()
    {
        $this->publisherKey = DevRIFT::getPublisherKey();
        $this->secretKey = DevRIFT::getSecretKey();
    }

    public function validateCode($MfaCode, $user_contact)
    {
        $data = array(
            'api-type' => 'mfa_verify',
            'mfa_code' => $MfaCode,
            'user_contact' => $user_contact,
            'rift_pk' => $this->publisherKey,
            'rift_sk' => $this->secretKey
        );

        // Use the ApiRequestor class to send the data to the API
        if ((new \DevRIFT\ApiRequestor())->request($data) === false) {
            return false;
        }
        return true;
    }

}