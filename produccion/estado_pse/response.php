<?php

function callAPI($method, $url, $data)
{
	$curl = curl_init();
	switch ($method) {
		case "POST":
			curl_setopt($curl, CURLOPT_POST, 1);
			if ($data) {
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			}

			break;
		case "PUT":
			curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
			if ($data) {
				curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
			}
			break;
		default:
			if ($data) {
				$url = sprintf("%s?%s", $url, http_build_query($data));
			}
	}

	curl_setopt($curl, CURLOPT_URL, $url);
	$result = curl_exec($curl);
	if (!$result) {
		die("Connection Failure");
	}
	curl_close($curl);
	return $result;
}

$get_data = callAPI('GET', 'https://secure.epayco.co/validation/v1/reference/' . $_GET["ref_payco"], false);
$response = json_decode($get_data, true);
$errors = $response['response']['errors'];
$data = $response['response']['data'][0];


