<?php

require_once 'includes/utilities.inc.php';

try {
	if (!isset($_GET['id']) || !filter_var($_GET['id'], FILTER_VALIDATE_INT, ['min_range' => 1])) {
		throw new Exception('An invalid page ID was provided to this page');	
	}

	$q = 'SELECT id, creatorId, title, content, DATE_FORMAT(dateAdded, "%e %M %Y") AS dateAdded FROM pages WHERE id=:id';
	$stmt = $pdo->prepare($q);
	$r = $stmt->execute([':id' => $_GET['id']]);

	if ($r) {
		$stmt->setFetchMode(PDO::FETCH_CLASS, 'Page');
		$page = $stmt->fetch();

		if ($page) {
			$pageTitle = $page->getTitle();

			require_once 'includes/header.inc.php';
			require_once 'views/page.html';
		} else {
			throw new Exception('An invalid page ID was provided to this page.');
		}
	} else {
		throw new Exception('An invalid page ID was provided to this page.');
	}
} catch (Exception $e) {
	$pageTitle = 'Error!';
	require_once 'includes/header.inc.php';
	require_once 'views/error.html';
}

require_once 'includes/footer.inc.php';
