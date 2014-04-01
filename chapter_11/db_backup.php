<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Database Backup</title>
</head>
<body>
<?php
//

$db_name = 'test';

$dir = "backups/$db_name";

if (!is_dir($dir)) {
	if (!@mkdir($dir)) {
		die("<p>The backup directory--$dir--could not be created.</p></body></html>");
	}
}

$time = time();

$dbc = @mysqli_connect('localhost', 'root', 'klvtz', $db_name) OR die("<p>The database--$db_name--could not be backed up.</p></body></html>");

$r = mysqli_query($dbc, 'SHOW TABLES');

if (mysqli_num_rows($r) > 0) {
	echo "<Backing up database '$db_name'.</p>";

	while (list($table) = mysqli_fetch_array($r, MYSQLI_NUM)) {
		$q = "SELECT * FROM $table";
		$r2 = mysqli_query($dbc, $q);

		if (mysqli_num_rows($r2) > 0) {
			if ($fp = gzopen("$dir/{$table}_{$time}.sql.gz", "w9")) {
				while ($row = mysqli_fetch_array($r2, MYSQLI_NUM)) {
					// write the data as a comma delineated row:
					foreach ($row as $value) {
						$value = addslashes($value);
						gzwrite($fp, "'$value', ");
					}

					gzwrite($fp, "\n");
				}

				echo "<p>Table '$table' backed up</p>";
			} else {
				echo "<p>The file--$dir/{$table}_{$time}.sql.gz--could not be opened for writing</p>";
				break;
			}		
		}
	}
} else {
	echo "<p>The submitted database--$db_name--contains no tables</p>";
}

?>
</body>
</html>
