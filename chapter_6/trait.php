<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Trait</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

require 'tDebug.php';
require 'Rectangle.php';

$r = new Rectangle(42, 37);
$r->dumpObject();

unset($r);

?>
</body>
</html>
