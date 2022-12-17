<?php

namespace DevRIFT\HALT;

use DevRIFT\DevRIFT;
use DevRIFT\Exception\HALTException;

class HALT
{
	public static function process()
	{
		$data = array(
			'api_type' => 'halt_check',
			'rift_pk' => DevRIFT::getPublisherKey(),
            'rift_sk' => DevRIFT::getSecretKey()
		);

		// Use the ApiRequestor class to send the data to the API
		if ((new \DevRIFT\ApiRequestor())->requestCode($data) != 200) {
			throw new HALTException();
		}
	}
}