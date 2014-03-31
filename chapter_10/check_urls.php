<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Validate URLs</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

function check_url($url) {
	$url_pieces = parse_url($url);

	$path = (isset($url_pieces['path'])) ? $url_pieces['path'] : '/';
	$port = (isset($url_pieces['port'])) ? $url_pieces['port'] : 80;


	if ($fp = fsockopen($url_pieces['host'], $port, $errno, $errstr, 30)) {
		$send = "HEAD $path HTTP/1.1\r\n";
		$send .= "HOST: {$url_pieces['host']}\r\n";
		$send .= "CONNECTION: Close\r\n\r\n";
		fwrite($fp, $send);

		// Read the response:
		$data = fgets($fp, 128);

		fclose($fp);


		list($response, $code) = explode(' ', $data);
		if ($code == 200) {
			return [$code, 'good'];
		} else {
			return [$code, 'bad'];
		}
	} else {
		return [$errstr, 'bad'];
	}
}


$urls = [
	'http://www.larryulman.com/',
	'http://www.larryulman.com/wp-admin/',
	'http://www.yiiframework.com/tutorials/',
	'http://video.google.com/videoplay?docid=-5137581991288263801&q=loose+change',
];

echo "<h2>Validating URLs</h2>";

set_time_limit(0);

foreach ($urls as $url) {
	list($code, $class) = check_url($url);
	echo "<p><a href=\"$url\" target=\"_new\">$url</a> (<span class=\"$class\">$code</span>)</p>\n";
}

?>
</body>
</html>
