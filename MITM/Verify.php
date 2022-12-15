<?php

namespace DevRIFT\MITM;

class MITM
{
    // Define the algorithm used for signing messages
    const SIGNATURE_ALGORITHM = 'sha256';

    /**
     * The client's public key
     *
     * @var string
     */
    protected $publicKey;

    /**
     * The nonce
     *
     * @var string
     */
    protected $nonce;

    /**
     * Constructor function
     *
     * @param string $publicKey The client's public key
     * @param string $nonce The nonce
     */
    public function __construct($publicKey, $nonce)
    {
        $this->publicKey = $publicKey;
        $this->nonce = $nonce;
    }

    /**
     * Validate the authenticity of the client using their digital signature
     *
     * @param string $data The data to be validated
     * @param string $signature The digital signature provided by the client
     *
     * @return bool True if the signature is valid, false otherwise
     */
    public function validateSignature($payload, $signature)
    {
        // Create a data array with the GET parameters and email
        $data = array(
            'api-type' => 'mitm_verify',
            'payload' => $payload,
            'signature' => $signature,
            'public_key' => $this->publicKey,
            'nonce' => $this->nonce
        );

        // Use the ApiRequestor class to send the data to the API
        return (new \DevRIFT\ApiRequestor())->request($data) === true;
    }
}