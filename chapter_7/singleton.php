<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Singleton</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
	<h2>Using a Singleton Config Object</h2>
<?php

require_once 'Config.php';

$CONFIG = Config::getInstance();
$CONFIG->set('live', 'true');
echo '<p>$CONFIG["live"]: ' . $CONFIG->get('live') . '</p>';

$TEST = Config::getInstance();
echo '<p>$TEST["live"]: ' . $CONFIG->get('live') . '</p>';

unset($CONFIG, $TEST);
?>
</body>
</html>
