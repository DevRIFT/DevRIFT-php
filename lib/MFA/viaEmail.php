<?php

namespace DevRIFT\MFA;

use DevRIFT\DevRIFT;

class MFA
{
    protected $publisherKey;

    protected $secretKey;

    // constructor
    public function __construct()
    {
        $this->publisherKey = DevRIFT::getPublisherKey();
        $this->secretKey = DevRIFT::getSecretKey();
    }
    public function viaEmail($email)
    {
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $data = array(
            'api_type' => 'mfa_create_email',
            'email' => $email,
            'rift_pk' => $this->publisherKey,
            'rift_sk' => $this->secretKey
        );

        if ((new \DevRIFT\ApiRequestor())->request($data) === false) {
            return false;
        }
        return true;
    }
}