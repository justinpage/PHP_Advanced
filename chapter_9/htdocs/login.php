<?php

require_once 'includes/utilities.inc.php';
require_once 'vendor/autoload.php';
$form = new HTML_QuickForm('loginForm', 'post');

$form->addElement('text', 'email', 'Email Address');
$form->applyFilter('text', 'trim');
$form->addRule('email', 'Please enter your email address.', 'required');

$form->addElement('password', 'pass', 'Password');
$form->applyFilter('password', 'trim');
$form->addRule('pass', 'Please enter your password', 'required');

$form->addElement('submit', 'submit', 'Login');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	if ($form->validate()) {
		$q = 'SELECT id, userType, username, email FROM users WHERE email=:email AND pass=SHA1(:pass)';
		$stmt = $pdo->prepare($q);
		$r = $stmt->execute([':email' => $form->exportValue('email'), ':pass' => $form->exportValue('pass')]);	
		if ($r) {
			$stmt->setFetchMode(PDO::FETCH_CLASS, 'User');
			$user = $stmt->fetch();
		}

		if ($user) {
			$_SESSION['user'] = $user;

			header("Location:index.php");	
			exit;
		}
	}
}


$pageTitle = 'Login';
require_once 'includes/header.inc.php';
require_once 'views/login.html';
require_once 'includes/footer.inc.php';
