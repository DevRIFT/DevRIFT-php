<?php

namespace DevRIFT\Activation;

use DevRIFT\DevRIFT;
use DevRIFT\Exception;

class Activation
{
    private static $publisherKey = null;
    private static $secretKey = null;

    public function __construct()
    {
        self::$publisherKey = DevRIFT::getPublisherKey();
        self::$secretKey = DevRIFT::getSecretKey();
    }

    public static function verify()
    {

        // check if $_GET['RIFT_Token'] and $_GET['RIFT_Selector'] is set
        if (!isset($_GET['RIFT_Token']) || !isset($_GET['RIFT_Selector'])) {
            throw new Exception\InvalidArgumentException("RIFT_Token or RIFT_Selector is not set");
        }

        // Create a data array with the GET parameters and email
        $data = array(
            'api-type' => 'activation_verify',
            'token' => $_GET['RIFT_Token'],
            'selector' => $_GET['RIFT_Selector'],
            'rift_pk' => self::$publisherKey,
            'rift_sk' => self::$secretKey
        );

        // Use the ApiRequestor class to send the data to the API
        return (new \DevRIFT\ApiRequestor())->requestReturn($data);
        // This will return a JSON string, the JSON string needs to get the status and the email that was activated
    }
}