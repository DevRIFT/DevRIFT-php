<?php

namespace DevRIFT\Magic;

use DevRIFT\DevRIFT;
use DevRIFT\Exception;

class Make
{
    private static $publisherKey = null;
    private static $secretKey = null;

    public function __construct()
    {
        self::$publisherKey = DevRIFT::getPublisherKey();
        self::$secretKey = DevRIFT::getSecretKey();
    }

    public static function magic($email)
    {
        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception\InvalidArgumentException("Invalid email address");
        }

        // Create a data array with the GET parameters and email
        $data = array(
            'api_type' => 'magic_create',
            'email' => $email,
            'rift_pk' => self::$publisherKey,
            'rift_sk' => self::$secretKey
        );

        // Use the ApiRequestor class to send the data to the API
        return (new \DevRIFT\ApiRequestor())->request($data);
    }
}