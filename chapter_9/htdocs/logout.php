<?php
require_once 'includes/utilities.inc.php';

if ($user) {
	$user = null;

	$_SESSION = [];

	setcookie(session_name(), false, time()-3600);

	session_destroy();
}


$pageTitle = 'Logout';
require_once 'includes/header.inc.php';
require_once 'views/logout.html';
require_once 'includes/footer.inc.php';
