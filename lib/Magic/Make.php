<?php

namespace DevRIFT\Magic;

use DevRIFT\DevRIFT;
use DevRIFT\Exception;

class Make
{
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
            'rift_pk' => DevRIFT::getPublisherKey(),
            'rift_sk' => DevRIFT::getSecretKey()
        );

        // Use the ApiRequestor class to send the data to the API
        return (new \DevRIFT\ApiRequestor())->requestReturn($data);
    }
}