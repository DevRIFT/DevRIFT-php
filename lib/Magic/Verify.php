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

    public static function magic($email, $token = $_GET['vl'], $selector = $_GET['sr'])
    {
        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception\InvalidArgumentException("Invalid email address");
        }

        // check if token and selector are defined
        if (!isset($token) || !isset($selector)) {
            throw new Exception\InvalidArgumentException("Invalid token or selector");
        }

        // Create a data array with the GET parameters and email
        $data = array(
            'api_type' => 'magic',
            'vl' => $token,
            'sr' => $selector,
            'email' => $email,
            'rift_pk' => self::$publisherKey,
            'rift_sk' => self::$secretKey
        );

        // Use the ApiRequestor class to send the data to the API
        $response = (new \DevRIFT\ApiRequestor())->requestReturn($data);

        if (!isset($response['success']['email'])) {
            throw new Exception\InvalidRequestException("The Activation Tokens are invalid");
        }

        return $response['success']['email'];
    }
}