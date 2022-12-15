<?php

namespace DevRIFT;

abstract class WebhookSignature
{
    const EXPECTED_SCHEME = 'v0';

    /**
     * Header Form Expected: t=[TIMESTAMP], [SIGNATURE_SCHEME]=[SIGNATURE]
     * Example: t=123456789,v0=abc123
     */
    public static function verifyHeader($payload, $header, $secret, $tolerance = null)
    {
        // Extract timestamp and signatures from header
        $timestamp = self::getTimestamp($header);
        $signatures = self::getSignatures($header, self::EXPECTED_SCHEME);
        if (-1 === $timestamp) {
            return false;
        }
        if (empty($signatures)) {
            return false;
        }

        
        // Check if expected signature is found in list of signatures from
        // header
        $signedPayload = "{$timestamp}.{$payload}";
        $expectedSignature = self::computeSignature($signedPayload, $secret);
        $signatureFound = false;
        foreach ($signatures as $signature) {
            if (Utilities\Utilities::secureCompare($expectedSignature, $signature)) {
                $signatureFound = true;

                break;
            }
        }
        if (!$signatureFound) {
            return false;
        }

        // Check if timestamp is within tolerance
        if (($tolerance > 0) && (\abs(\time() - $timestamp) > $tolerance)) {
            return false;
        }

        return true;
    }

    /**
     * Extracts the timestamp in a signature header.
     *
     * @param string $header the signature header
     *
     * @return int the timestamp contained in the header, or -1 if no valid
     *  timestamp is found
     */
    private static function getTimestamp($header)
    {
        $items = \explode(',', $header);

        foreach ($items as $item) {
            $itemParts = \explode('=', $item, 2);
            if ('t' === $itemParts[0]) {
                if (!\is_numeric($itemParts[1])) {
                    return -1;
                }

                return (int) ($itemParts[1]);
            }
        }

        return -1;
    }

    /**
     * Extracts the signatures matching a given scheme in a signature header.
     *
     * @param string $header the signature header
     * @param string $scheme the signature scheme to look for
     *
     * @return array the list of signatures matching the provided scheme
     */
    private static function getSignatures($header, $scheme)
    {
        $signatures = [];
        $items = \explode(',', $header);

        foreach ($items as $item) {
            $itemParts = \explode('=', $item, 2);
            if (\trim($itemParts[0]) === $scheme) {
                $signatures[] = $itemParts[1];
            }
        }

        return $signatures;
    }

    /**
     * Computes the signature for a given payload and secret.
     *
     * The current scheme used by DevRIFT ("v0") is HMAC/SHA-256.
     *
     * @param string $payload the payload to sign
     * @param string $secret the secret used to generate the signature
     *
     * @return string the signature as a string
     */
    private static function computeSignature($payload, $secret)
    {
        return \hash_hmac('sha256', $payload, $secret);
    }
}