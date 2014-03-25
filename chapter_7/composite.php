<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <title>Composite</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
   <h2>Using Composite</h2>
<?php


require_once 'WorkUnit.php';

$alpha = new Team('Alpha');
$john = new Employee('John');
$alice= new Employee('Alice');
$justin = new Employee('Justin');

$alpha->add($john);
$alpha->add($justin);

$alpha->assignTask('Do something great.');
$alice->assignTask('Do something grand.');

$alpha->completeTask('Do something great.');

// remove 
$alpha->remove($john);

unset($alpha, $john, $alice, $justin);


?>
</body>
</html>
