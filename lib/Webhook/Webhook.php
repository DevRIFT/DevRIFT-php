<?php

/* Usage:
use DevRIFT\Webhook;

$payload = '{"event":"test_event","data":"test_data"}';
$sigHeader = 't=1603513200, v0=f0b31d2e47f9b9eeccfd0e17e23f5058b5c47ccc826a4f637d4b28e9b9ef9f55';
$secret = 'my_secret';

$event = Webhook::constructEvent($payload, $sigHeader, $secret);
if ($event === false) {
    // Signature is invalid
} else {
    // Signature is valid
}

*/

namespace DevRIFT;

/**
 * Webhook Class
 */
abstract class Webhook
{
    /**
     * Summary of DEFAULT_TOLERANCE
     * @var int
     */
    public const DEFAULT_TOLERANCE = 300;

    /**
     * Summary of secretKey
     * @var string
     */
    protected $secretKey;

    /**
     * Summary of __construct
     * Gets the secret key from DevRIFT class and sets it to the protected variable
     */
	public function __construct()
	{
		$this->secretKey = DevRIFT::getSecretKey();
	}

    /**
     * Summary of constructEvent
     * @param mixed $payload
     * @param mixed $sigHeader
     * @param mixed $secret
     * @param mixed $tolerance
     * @return bool
     */
    public static function constructEvent($payload, $sigHeader, $secret = $this->secretKey, $tolerance = self::DEFAULT_TOLERANCE)
    {
        WebhookSignature::verifyHeader($payload, $sigHeader, $secret, $tolerance);

        $data = \json_decode($payload, true);
        $jsonError = \json_last_error();
        if (null === $data && \JSON_ERROR_NONE !== $jsonError) {
            return false;
        }

        return false;
    }
}