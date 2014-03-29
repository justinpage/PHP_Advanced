<?php

function class_loader($class)
{
	require_once 'classes/' . $class . '.php';
}
spl_autoload_register('class_loader');

session_start();

$user = (isset($_SESSION['user'])) ? $_SESSION['user'] : null;

try {
	$pdo = new PDO('mysql:dbname=test;host=localhost', 'root', 'klvtz');	
} catch (PDOException $e) {
	$pageTitle = "Error!";
	include('includes/header.inc.php');
	include('views/error.html');
	include('includes/footer.inc.php');
	exit();
}
