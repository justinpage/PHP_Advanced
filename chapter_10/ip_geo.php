<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>IP Geolocation</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php
function show_ip_info($ip) {
	$url = 'http://freegeoip.net/csv/' . $ip;

	$fp = fopen($url, 'r');
	$read = fgetcsv($fp);
	fclose($fp);

	echo "<p>Ip Address: $ip</br>
	Country: $read[2]<br>
	City, State: $read[5], $read[3]<br>
	Latitude: $read[7]<br>
	Longitude: $read[8]</p>";
}

echo "<h2>Our spies tell us the following information about you</h2>";
show_ip_info($_SERVER['REMOTE_ADDR']);

$url = 'www.demonoid.ph';
echo "<h2>Our spies tell us the following information about the URL $url</h2>";
show_ip_info(gethostbyname($url));

?>

</body>
</html>
