<?php

namespace DevRIFT\Activation;

use DevRIFT\DevRIFT;
use DevRIFT\Exception;

/**
 * Activation Class
 */
class Activation
{
    /**
     * Request an activation email
     * 
     * @param string $email The email address of the user
     * 
     * @return bool Returns true if the email was sent, false otherwise
     */
    public static function request($email)
    {
        // Check if the email is valid
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception\InvalidArgumentException("Invalid email address");
        }

        // Create a data array with the GET parameters and email
        $data = array(
            'api_type' => 'activation_create',
            'email' => $email,
            'rift_pk' => DevRIFT::getPublisherKey(),
            'rift_sk' => DevRIFT::getSecretKey()
        );

        // Use the ApiRequestor class to send the data to the API
        return (new \DevRIFT\ApiRequestor())->request($data);
    }
}