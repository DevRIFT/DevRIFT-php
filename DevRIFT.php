<?php

namespace DevRIFT;

/**
 * Class DevRIFT.
 */
class DevRIFT
{
    /** @var string The base URL for the DevRIFT API. */
    const BASE_URL = 'https://api.devrift.co/';

    /** @var int VERIFY Constant */
    const VERIFY = 0;

    /** @var int TEST Constant */
    const TEST = 1;

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

    public static function getPublisherKey()
    {
        return self::$publisherKey;
    }

    public static function getSecretKey()
    {
        return self::$secretKey;
    }

    public static function getApiBase()
    {
        return self::BASE_URL;
    }
}