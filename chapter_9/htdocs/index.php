<?php

require_once 'includes/utilities.inc.php';

$pageTitle = 'Welcome to the Site!';
require_once 'includes/header.inc.php';

try {
	$q = 'SELECT id, title, content, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded FROM pages ORDER BY dateAdded DESC LIMIT 3';
	$r = $pdo->query($q);

	if ($r && $r->rowCount() > 0) {
		$r->setFetchMode(PDO::FETCH_CLASS, 'Page');

		require_once 'views/index.html';
	} else {
		throw new Exception('No content is available to be viewed at this time.');
	}
} catch (Exception $e) {
	require_once 'views/error.html';
}

require_once 'includes/footer.inc.php';
?>
