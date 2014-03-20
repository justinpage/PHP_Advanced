<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Rectangle</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

require_once 'Rectangle.php';

$width = 160;
$height = 75;

echo "<h2>With a width of $width and a height of $height...</h2>";

$r = new Rectangle($width, $height);

echo '<p>The area of the rectangle is ' . $r->getArea() . "</p>";
echo '<p>The perimeter of the rectangle is ' . $r->getPerimeter() . "</p>";

echo '<p>This rectangle is ';
if ($r->isSquare()) {
	echo 'also';
} else {
	echo 'not';
}

echo ' a square.</p>';

// delete the object
unset($r);

?>
</body>
</html>
