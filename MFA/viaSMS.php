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

    public static function viaSMS($phone_number)
    {
        $phone_number = filter_var($phone_number, FILTER_SANITIZE_NUMBER_INT);

        $data = array(
            'api-type' => 'mfa_create_sms',
            'phone_number' => $phone_number,
            'rift_pk' => self::$publisherKey,
            'rift_sk' => self::$secretKey
        );

        if ((new \DevRIFT\ApiRequestor())->request($data) === false) {
            return false;
        }
        return true;
    }
}