<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Factory</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

function class_loader($class)
{
	require_once $class . '.php';
}

spl_autoload_register('class_loader');

if (isset($_GET['shape'], $_GET['dimensions'])) {
	$obj = ShapeFactory::Create($_GET['shape'], $_GET['dimensions']);
	echo "<h2>Creating a {$_GET['shape']}...</h2>";
	echo "<p>The area is " . $obj->getArea() . '</p>';
	echo "<p>The perimeter is " . $obj->getPerimeter() . "</p>";
} else {
	echo '<p class="error">Please provide a shape type and size</p>';
}

unset($obj);
?>
</body>
</html>
