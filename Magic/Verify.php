<?php

namespace DevRIFT\Magic;

use DevRIFT\DevRIFT;
use DevRIFT\Exception;

class Verify
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

        // check if $_GET['RIFT_Token'] and $_GET['RIFT_Selector'] is set
        if (!isset($_GET['RIFT_Token']) || !isset($_GET['RIFT_Selector'])) {
            throw new Exception\InvalidArgumentException("RIFT_Token or RIFT_Selector is not set");
        }

        // Create a data array with the GET parameters and email
        $data = array(
            'api-type' => 'magic',
            'token' => $_GET['RIFT_Token'],
            'selector' => $_GET['RIFT_Selector'],
            'email' => $email,
            'rift_pk' => self::$publisherKey,
            'rift_sk' => self::$secretKey
        );

        // Use the ApiRequestor class to send the data to the API
        return (new \DevRIFT\ApiRequestor())->request($data);
    }
}