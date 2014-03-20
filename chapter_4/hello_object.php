<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Hello, World</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php
require_once 'HelloWorld.php';

$obj = new HelloWorld();

$obj->sayHello();

$obj->sayHello('Italian');
$obj->sayHello('Dutch');
$obj->sayHello('French');

unset($obj);
?>
</body>
</html>
