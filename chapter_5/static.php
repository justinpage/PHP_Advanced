<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <title>Static</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

class Pet 
{
	protected $name;
	private static $_count = 0;

	function __construct($pet_name) 
	{
		$this->name = $pet_name;
		self::$_count++;
	}

	function __destruct() 
	{
		self::$_count--;
	}

	public static function getCount()
	{
		return self::$_count;
	}
}

class Cat extends Pet {}
class Dog extends Pet {}
class Ferret extends Pet {}
class Pikachu extends Pet {}

$dog = new Dog('Old Yellar');
echo '<p>After creating a dog, I now have ' . Pet::getCount() . ' pet(s).</p>';


$cat= new Cat('Bucky');
echo '<p>After creating a cat, I now have ' . Pet::getCount() . ' pet(s).</p>';

$ferret= new Ferret('Fungo');
echo '<p>After creating a ferret, I now have ' . Pet::getCount() . ' pet(s).</p>';

unset($dog);
echo '<p>After tragedy strikes, I now have ' . Pet::getCount() . ' pet(s).</p>';

$pikachu = new Pikachu('Pikachu');

echo '<p>After creating a pikachu, I now have ' . Pet::getCount() . ' pet(s).</p>';

unset($cat, $ferret, $pikachu);
?>
</body>
</html>
