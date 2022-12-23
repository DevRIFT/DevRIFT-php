<?php

namespace DevRIFT\Magic;

use DevRIFT\DevRIFT;
use DevRIFT\Exception;

/**
 * Magic Verify Class
 * 
 * This class is used to verify a magic link
 */
class Verify
{
    /**
     * Summary of magic
     * @param mixed $email
     * @return mixed
     * @throws Exception\InvalidArgumentException
     * @throws Exception\InvalidRequestException
     */
    public static function magic()
    {
        if (!isset($_GET['vl']) || !isset($_GET['sr'])) {
            return false;
            //throw new Exception\InvalidArgumentException("No Validator or Selector provided.");
        }
        
        $token = $_GET['vl'];
        $selector = $_GET['sr'];

        // check if token and selector are defined
        if (!isset($token) || !isset($selector)) {
            return false;
            //throw new Exception\InvalidArgumentException("Invalid token or selector");
        }

        // Create a data array with the GET parameters and email
        $data = array(
            'api_type' => 'magic_verify',
            'vl' => $token,
            'sr' => $selector,
            'rift_pk' => DevRIFT::getPublisherKey(),
            'rift_sk' => DevRIFT::getSecretKey()
        );

        // Use the ApiRequestor class to send the data to the API
        $response = json_decode((new \DevRIFT\ApiRequestor())->requestReturn($data), true);

        if (isset($response['success']) && isset($response['success']['email'])) {
            return $response['success']['email'];
        } else {
            return false;
            //throw new Exception\InvalidRequestException("The Activation Tokens are invalid");
        }

    }
}