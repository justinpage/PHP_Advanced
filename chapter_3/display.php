<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Cities and Zip Codes</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

$state = 'CA';

$items = 5;

echo "<h1>Cities and Zip Codes found in $state</h1>";

$dbc = mysqli_connect('localhost', 'root', 'battosai', 'zips');

$q = "SELECT city, zip_code FROM zip_codes WHERE state='$state' ORDER BY city";
$r = mysqli_query($dbc, $q);

if (mysqli_num_rows($r) > 0) {
	echo '<table border="2" width="90%" cellspacing=3 cellpadding=3 align="center>"';

	$i = 0;
	while (list($city, $zip_code) = mysqli_fetch_array($r, MYSQLI_NUM)) {
		if ($i === 0) {
			echo "<tr>";
		}

		echo "<td align=\"center\">$city, $zip_code</td>";
		$i++;

		if($i === $items) {
			echo "</tr>";
			$i = 0;
		}
	}

	if ($i > 0) {
		for (;$i < $items; $i++) {
			echo "<td>&nbsp;</td>\n";
		}

		echo "</tr>";
	}

	echo "</table>";
} else {
	echo "<p class='error'>an invalid state abbrerviation was used.</p>";
}

mysqli_close($dbc);
?>

</body>
</html>

