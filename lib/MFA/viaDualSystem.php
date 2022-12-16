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

    public function viaDualSystem($phone_number, $email)
    {
        $phone_number = filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT);
        $email = filter_var($email, FILTER_SANITIZE_EMAIL);

        $data = array(
            'api_type' => 'mfa_create_dual',
            'phone_number' => $phone_number,
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