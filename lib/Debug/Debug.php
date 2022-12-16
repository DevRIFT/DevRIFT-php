<?php

namespace DevRIFT\Debug;

use DevRIFT\DevRIFT;
use DevRIFT\Exception;
use DevRIFT\ApiRequestor;

class Debug
{
    /**
     * Check if the API keys provided are valid.
     * 
     * WARNING: Do not use this function in production.
     * 
     * @throws Exception\DebugFailureException
     * @throws Exception\DebugSuccessException
     * 
     * Note: This function is only for debugging purposes.
     * This function is likely to be removed or changed in the future.
     */
    public static function keys()
    {
        $keys = DevRIFT::getApiKeys();
        if (!isset($keys['rift_pk']) || !isset($keys['rift_sk'])) {
            throw new Exception\DebugFailureException("Keys were not provided");
        } else {
            array_merge(
                $keys,
                array(
                    'api_type' => 'debug_keys'
                )
            );
            if ((new ApiRequestor())->request($keys)) {
                throw new Exception\DebugSuccessException("Keys are valid");
            } else {
                throw new Exception\DebugFailureException("Keys are invalid");
            }
        }
    }
}