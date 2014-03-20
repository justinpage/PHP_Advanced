<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Pets</title>
<link href='../bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

class Pet
{
	public $name;

	function __construct($pet_name)
	{
		$this->name = $pet_name;
		self::sleep();
	}

	function eat()
	{
		echo "<p>$this->name is eating.</p>";
	}

	function sleep()
	{
		echo "<p>$this->name is sleeping.</p>";
	}

	function play()
	{
		echo "<p>$this->name is playing </p>";
	}
}

class Cat extends Pet
{
	function play()
	{
		parent::play();
		echo "<p>$this->name is climbing</p>";
	}
}

class Dog extends Pet
{
	function play()
	{
		parent::play();
		echo "<p>$this->name is fetching</p>";
	}
}

$dog = new Dog('Doge');
$cat = new Cat('Niko');
$pet = new Pet('Rob');

$dog->eat();
$cat->eat();
$pet->eat();

$dog->sleep();
$cat->sleep();
$pet->sleep();

$dog->play();
$cat->play();
$pet->play();

unset($dog, $cat, $pet);

?>
</body>
</html>
