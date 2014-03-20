<?php

// include config settings -debug, constants
require_once 'includes/config.inc.php';

// check if parameters are provided
if (isset($_GET['p'])) {
	$p = $_GET['p'];
} elseif (isset($_POST['p'])) {
	$p = $_POST['p'];
} else {
	$p = null;
}

// determine what page to display
switch ($p) {
	case 'about':
		$page = 'about.inc.php';
		$page_title = 'About This Site';
		break;
	case 'contact':
		$page = 'contact.inc.php';
		$page_title = 'Contact Us';
		break;
	case 'search':
		$page = 'search.inc.php';
		$page_title = 'Search Results';
		break;
	
	default:
		$page = 'main.inc.php';
		$page_title = 'Site Home Page';	
		break;
}

// make sure the file exists
if (!file_exists('./modules/'. $page)) {
	$page = 'main.inc.php';
	$page_title = 'Site Home Page';	
}

include_once 'includes/header.html';

include_once './modules/' . $page;

include_once './includes/footer.html';
