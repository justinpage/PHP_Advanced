<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Constructors and Destructors</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php
class Demo 
{
	function __construct()
	{
		echo "<p>In the constructor.</p>";
	}

	function __destruct()
	{
		echo "<p>In the destructor</p>";
	}
}

function test() {
	echo "<p>In the function. Creating a new Object</p>";
	$f = new Demo();
	echo "<p>About to leave the function</p>";
}

$o = new Demo();
echo "<p>Creating a new object</p>";

echo "<p>Calling the function</p>";
test();

echo "<p>About to delete the object</p>";
unset($o);

echo "<p>End of the script.</p>";
?>
</body>
</html>
