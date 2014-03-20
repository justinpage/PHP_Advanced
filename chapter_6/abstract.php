<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Triangle</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

require_once 'Shape.php';
require_once 'Triangle.php';

$sides = [];
$sides[] = 5;
$sides[] = 10;
$sides[] = 13;

echo "<h2>With sides of {$sides[0]}, {$sides[1]}, and {$sides[2]}...</h2>";

$t = new Triangle($sides[0], $sides[1], $sides[2]);

echo "<p>The area of the triangle is " . $t->getArea() . "</p>";
echo "<p>The perimeter of the triangle is " . $t->getPerimeter() . "</p>";

unset($t);
?>
</body>
</html>


