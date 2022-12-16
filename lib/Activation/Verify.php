<?php

namespace DevRIFT\Activation;

use DevRIFT\DevRIFT;
use DevRIFT\Exception;

/**
 * Summary of Activation
 * 
 * @return string Returns the email address of the user
 */
class Activation
{
    private static $publisherKey = null;
    private static $secretKey = null;

    public function __construct()
    {
        self::$publisherKey = DevRIFT::getPublisherKey();
        self::$secretKey = DevRIFT::getSecretKey();
    }

    public static function verify($token = $_GET['vl'], $selector = $_GET['sr'])
    {

        // check if token and selector are defined
        if (!isset($token) || !isset($selector)) {
            throw new Exception\InvalidArgumentException("Invalid token or selector");
        }

        // Create a data array with the GET parameters and email
        $data = array(
            'api_type' => 'activation_verify',
            'vl' => $token,
            'sr' => $selector,
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