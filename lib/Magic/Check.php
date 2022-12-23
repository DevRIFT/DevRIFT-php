<?php

namespace DevRIFT\Magic;

use DevRIFT\DevRIFT;
use DevRIFT\Exception;

/**
 * Magic Check Class
 * 
 * This class is used to check a magic link
 */
class Check
{
    /**
     * Summary of magic
     * @param mixed $email
     * @return mixed
     * @throws Exception\InvalidArgumentException
     * @throws Exception\InvalidRequestException
     */
    public static function magic($email)
    {
        $token = $_GET['vl'];
        $selector = $_GET['sr'];

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
            'api_type' => 'magic_verify',
            'magic_check' => 1,
            'vl' => $token,
            'sr' => $selector,
            'email' => $email,
            'rift_pk' => DevRIFT::getPublisherKey(),
            'rift_sk' => DevRIFT::getSecretKey()
        );

        // Use the ApiRequestor class to send the data to the API
        return (new \DevRIFT\ApiRequestor())->request($data) === true;
    }
}