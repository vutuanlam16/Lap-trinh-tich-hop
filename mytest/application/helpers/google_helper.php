<?php
function google_shorten($long_url) {
		
	$ch = curl_init('https://www.googleapis.com/urlshortener/v1/url' . '?key=' . 'AIzaSyC5LnjfTCdthJMcBLBzebSffnSlH0OXo_c');
	
	curl_setopt_array(
		$ch,
		array(
			CURLOPT_HTTPHEADER => array('Content-Type: application/json'),
			CURLOPT_RETURNTRANSFER => 1,
			CURLOPT_TIMEOUT => 5,
			CURLOPT_CONNECTTIMEOUT => 0,
			CURLOPT_POST => 1,
			CURLOPT_SSL_VERIFYHOST => 0,
	CURLOPT_SSL_VERIFYPEER => 0,
			CURLOPT_POSTFIELDS => '{"longUrl": "' . $long_url . '"}'
		)
	);
	
	$json_response = json_decode(curl_exec($ch), true);
	return $json_response['id'] ? $json_response['id'] : '404';
}