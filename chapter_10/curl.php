<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Using cURL</title>
</head>
<body>
<h2>cURL Results:</h2>
<?php # Script 10.4 - curl.php
// This page uses cURL to post data to a Web service.

set_time_limit(0);
// Identify the URL:
try {

	$url = 'http://127.0.0.1/PHP_Advanced/sandbox/chapter_10/service.php';

	// Start the process:
	$curl = curl_init();
	if (false === $curl) {
		throw new Exception('failed to init');
	}

	curl_setopt($curl, CURLOPT_URL, $url);

	// Tell cURL to fail if an error occurs:
	curl_setopt($curl, CURLOPT_FAILONERROR, 1);

	// Allow for redirects:
	curl_setopt($curl, CURLOPT_FOLLOWLOCATION, 1);

	// Assign the returned data to a variable:
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

	// Set the timeout:
	curl_setopt($curl, CURLOPT_TIMEOUT, 5);

	// Use POST:
	curl_setopt($curl, CURLOPT_POST, 1);

	// Set the POST data:
	curl_setopt($curl, CURLOPT_POSTFIELDS, 'name=foo&pass=bar&format=json');

	// Execute the transaction:
	$r = curl_exec($curl);
	if(false === $r) {
		throw new Exception(curl_error($curl), curl_errno($ch));
	}
	// Close the connection:
	curl_close($curl);

	// Print the results:
	print_r($r);
} catch (Exception $e) {
	trigger_error(sprintf(
		'Curl failed with error #%d: %s',
		$e->getCode(), $e->getMessage()), E_USER_ERROR);
}

?>
</body>
</html>
