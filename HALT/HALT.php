<?php

namespace DevRIFT\HALT;

use DevRIFT\DevRIFT;
use DevRIFT\Exception\HALTException;

class HALT
{
	protected $publisherKey;

	protected $secretKey;

	public function __construct()
	{
		$this->publisherKey = DevRIFT::getPublisherKey();
		$this->secretKey = DevRIFT::getSecretKey();
	}

	public function process()
	{
		$data = array(
			'api-type' => 'halt_check',
			'rift_pk' => $this->publisherKey,
			'rift_sk' => $this->secretKey
		);

		// Use the ApiRequestor class to send the data to the API
		if ((new \DevRIFT\ApiRequestor())->requestCode($data) != 200) {
			throw new HALTException();
		}
	}
}