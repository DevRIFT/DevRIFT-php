<?php

namespace DevRIFT;

/**
 * Class DevRIFT.
 */
class DevRIFT
{
    /** @var string The base URL for the DevRIFT API. */
    public const BASE_URL = 'https://api.devrift.dev/';
    // FIXME: Change this to https://api.devrift.co/ before release

    /** @var int VERIFY Constant */
    public const VERIFY = 0;
    // FIXME: This feature may not be implemented in the first release
    // Hence, this constant may be removed

    /** @var int TEST Constant */
    public const TEST = 1;
    // FIXME: This feature may not be implemented in the first release
    // Hence, this constant may be removed

    /** @var string The Publisher API Key to be used for requests. */
    public static $publisherKey;

    /** @var string The Secret API Key to be used for requests. */
    public static $secretKey;

    /**
     * Summary of setApiKeys
     * @param string $publisherKey
     * @param string $secretKey
     * @return void
     */
    public static function setApiKeys($publisherKey, $secretKey)
    {
        self::$publisherKey = $publisherKey;
        self::$secretKey = $secretKey;
    }

    /**
     * Get Stored API Keys
     * @return array
     */
    public static function getApiKeys()
    {
        return array(
            'publisherKey' => self::$publisherKey,
            'secretKey' => self::$secretKey
        );
    }

    /**
     * getPublisherKey
     * 
     * Get the Publisher API Key.
     * 
     * @return string
     */
    public static function getPublisherKey()
    {
        return self::$publisherKey;
    }

    /**
     * getSecretKey
     * 
     * Get the Secret API Key.
     * 
     * @return string
     */
    public static function getSecretKey()
    {
        return self::$secretKey;
    }

    /**
     * getApiBase
     * 
     * Get the base URL for the API.
     * 
     * @return string
     */
    public static function getApiBase()
    {
        return self::BASE_URL;
    }
}