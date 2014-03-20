<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Visibility</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>

<?php

class Test
{
	public $public = 'public';
	protected $protected = 'protected';
	private $_private = 'private';

	// function for printing a variable's value:
	function printVar($var)
	{
		echo "<p>In Test, \$$var: '{$this->$var}'.</p>";
	}
}

class LittleTest extends Test
{
	function printVar($var)
	{
		echo "<p>In LittleTest, \$$var: '{$this->$var}'.</p>";
	}
}

$parent = new Test();
$child = new LittleTest();

echo "<h1>Public</h1>";
echo "<h2>Initially...</h2>";
$parent->printVar('public');
$child->printVar('public');


echo '<h2>Modifying $parent->public</h2>';
$parent->public = 'modified';
$parent->printVar('public');
$child->printVar('public');

echo "<hr><h1>Protected</h1>";
echo "<h2>Initially...</h2>";
$parent->printVar('protected');
$child->printVar('protected');

echo '<h2>Attempt: Modifying $parent->protected</h2>';
/* $parent->protected = 'modified'; */
$parent->printVar('protected');
$child->printVar('protected');

echo "<hr><h1>Private</h1>";
echo "<h2>Initially...</h2>";
$parent->printVar('_private');
$child->printVar('_private');

echo '<h2>Attempt: Modifying $parent->_private</h2>';
$parent->_private = 'modified';
$parent->printVar('_private');
$child->printVar('_private');

unset($parent, $child);
?>
</body>
</html>
