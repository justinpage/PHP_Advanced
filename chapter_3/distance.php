<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Distance Calculator</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

$zip = 93535;
$dbc = mysqli_connect('localhost', 'root', 'battosai', 'zips');
$q = "SELECT city from zip_codes where zip_code='$zip' LIMIT 1"; 
$r = mysqli_query($dbc, $q);
if (mysqli_num_rows ($r) === 1) {
	list($city) = mysqli_fetch_array($r, MYSQLI_NUM);
}

echo "<h1>Nearest stores to ". ucfirst(strtolower($city)) . ":</h1>";


$q = "SELECT latitude, longitude FROM zip_codes WHERE zip_code='$zip' AND latitude IS NOT NULL";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) === 1) {
	list($lat, $long) = mysqli_fetch_array($r, MYSQLI_NUM);

	// Big, main, complex, wordy query:
	$q = "SELECT name, CONCAT_WS('<br>', address1, address2), city, state, stores.zip_code, phone, ROUND(return_distance($lat, $long, latitude, longitude)) AS distance FROM stores LEFT JOIN zip_codes USING (zip_code) ORDER BY distance ASC LIMIT 3";
	$r = mysqli_query($dbc, $q);

	if (mysqli_num_rows($r) > 0) {
		while ($row = mysqli_fetch_array($r, MYSQLI_NUM)) {
			echo "<h2>$row[0]</h2>
				<p>$row[1]<br/>" . ucfirst(strtolower($row[2])) . ", $row[3] $row[4]<br/>
				$row[5]<br/>
				(approximately $row[6] miles)\n";
		}
	} else {
		echo "<p class='error'>No stores matched the search.</p>";
	}
} else {
	echo "<p class='error'>An invalid zip code was entered.</p>";
}

// close the connection
mysqli_close($dbc);
?>
