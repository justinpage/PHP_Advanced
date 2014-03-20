<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Square</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

require_once 'Rectangle.php';

class Square extends Rectangle
{
	function __construct($side = 0)
	{
		$this->width = $side;
		$this->height = $side;
	}
}

$width = 21;
$height = 98;

echo "<h2>with a width of $width and height of $height...</h2>";

$r = new Rectangle($width, $height);

echo '<p>The area of the rectangle is ' . $r->getArea() . '</p>';
echo '<p>The perimeter of the rectangle is ' . $r->getPerimeter() . '</p>';

$side = 60;
echo "<h2>with each side being $side...</h2>";


$s = new Square($side);
echo '<p>The area of the square is ' . $s->getArea() . '</p>';
echo '<p>The perimeter of the perimeter is ' . $r->getPerimeter() . '</p>';
?>
</body>
</html>
