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

abstract class Webhook
{
    const DEFAULT_TOLERANCE = 300;

    protected $secretKey;

	public function __construct()
	{
		$this->secretKey = DevRIFT::getSecretKey();
	}

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