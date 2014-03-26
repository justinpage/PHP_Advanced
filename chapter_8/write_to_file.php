<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Handling Exceptions</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php


try {
	$fp = new SplFileObject('data.txt', 'w');
	$fp->fwrite("This is a line of data. \n");
	unset($fp);
	echo "<p>The data has been written.</p>";

	$dir = new DirectoryIterator('.');
	foreach ($dir as $item) {
		if ($item->isDir() && !$item->isDot()) {
			echo $item->getBasename() . "<br/>";
		}
	}
} catch (Exception $e) {
	echo "<p>The process could not be completed because the script: " . $e->getMessage() . "</p>";
}

echo "<p>This is the end of the script</p>";

?>
</body>
</html>
