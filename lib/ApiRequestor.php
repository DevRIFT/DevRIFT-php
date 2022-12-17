<?php

namespace DevRIFT;

/**
 * Class ApiRequestor.
 */
class ApiRequestor
{
	/**
	 * @var string $apiBase
	 */
	protected $apiBase;

	/**
	 * ApiRequestor constructor.
	 */
	public function __construct()
	{
		$this->apiBase = DevRIFT::getApiBase();
	}

	/**
	 * Function request.
	 * 
	 * This function is used to send a request to the DevRIFT API.
	 * 
	 * Returns true if the HTTP response code is 200, false otherwise.
	 * 
	 * @param $data
	 *
	 * @return bool
	 */
	public function request($data)
	{
		// Use cURL to send the data to the API
		$ch = curl_init($this->apiBase);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);

		// Get the HTTP response code
		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		// Close the cURL handle
		curl_close($ch);

		// Return true if the HTTP code is 200, false otherwise
		return $httpCode === 200;
	}

	/**
	 * Function requestReturn.
	 * 
	 * This function is used to send a request to the DevRIFT API.
	 * 
	 * Returns the response from the API.
	 * 
	 * @param $data
	 *
	 * @return mixed
	 */
	public function requestReturn($data)
	{
		// Use cURL to send the data to the API
		$ch = curl_init($this->apiBase);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		$response = curl_exec($ch);
		curl_close($ch);

		return $response;
	}

	/**
	 * Function requestCode.
	 * 
	 * This function is used to send a request to the DevRIFT API.
	 * 
	 * Returns the HTTP Code from the API.
	 * 
	 * @param $data
	 *
	 * @return int
	 */
	public function requestCode($data)
	{
		// Use cURL to send the data to the API
		$ch = curl_init($this->apiBase);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
		curl_exec($ch);
		curl_close($ch);

		$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);

		return $httpCode;
	}
}