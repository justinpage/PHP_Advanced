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
	}

	function eat()
	{
		echo "<p>$this->name is eating.</p>";
	}

	function sleep()
	{
		echo "<p>$this->name is sleeping.</p>";
	}
}

class Cat extends Pet 
{
	function climb()
	{
		echo "<p>$this->name is climbing</p>";
	}
}

class Dog extends Pet
{
	function fetch()
	{
		echo "<p>$this->name is fetching</p>";
	}
}

$dog = new Dog('Doge');
$cat = new Cat('Niko');

$dog->eat();
$cat->eat();

$dog->sleep();
$cat->sleep();

$dog->fetch();
$cat->climb();

unset($dog, $cat);

?>
</body>
</html>
