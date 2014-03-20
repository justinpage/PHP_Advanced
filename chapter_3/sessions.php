<?php
require 'db_sessions.inc.php';
?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>DB Session Test</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

if (empty($_SESSION)) {
	$_SESSION['blah'] = 'umlaut';
	$_SESSION['this'] = 3615684.5;
	$_SESSION['that'] = 'blue';
	echo "<p>Session data stored.</p>";
} else {
	echo "<p>Session Data Exists:<pre>" . print_r($_SESSION, 1) . '</pre></p>';
}

// log the user out, if applicable
if (isset($_GET['logout'])) {
	session_destroy();
	echo "<p>Session destroyed</p>";
} else {
	echo "<a href=sessions.php?logout=true>Log Out</a>";
}

// reprint the sessions data
echo "<p>Session Data:<pre>" . print_r($_SESSION, 1) . '</pre></p>';

echo "</body></html>";

// write and close sessions:
session_write_close();
?>
