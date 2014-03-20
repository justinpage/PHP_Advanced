<?php

if(!defined('BASE_URL')) {
	require_once '../includes/config.inc.php';

	$url = BASE_URL . 'index.php?p=search';

	if(isset($_GET['terms'])) {
		$url .= '$terms=' . urlencode($_GET['terms']);
	}

	header("Location: $url");
	exit;
}

echo '<h1>Search Results</h2>';

if (isset($_GET['terms']) && ($_GET['terms'] != 'Search...')) {
	// query the database
	// fetch the results
	// print the results:
	for ($i = 0; $i < 10; $i++) {
		echo <<<EOT
<h4><a href="#">Search Result #$i</a></h4>
<p>This is some description. This is some description. This is some description.</p>\n
EOT;
	}
} else {
	echo '<p class="error">Please use the search form to search this site</p>';
}
