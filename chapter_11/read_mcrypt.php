<?php session_start(); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>A More Secure Session</title>
</head>
<body>
<?php

if (isset($_SESSION['thing1'], $_SESSION['thing2'])) {
	$key = md5('77 public drop-shadow Java');

	// open the cipher, using Rijndael 256 in CBC mode
	$m = mcrypt_module_open('rijndael-256', '', 'cbc', '');

	// decode the IV:
	$iv = base64_decode($_SESSION['thing2']);

	// init the encryption
	mcrypt_generic_init($m, $key, $iv);

	$data = mdecrypt_generic($m, base64_decode($_SESSION['thing1']));

	// close the encryption handler and cipher
	mcrypt_generic_deinit($m);

	mcrypt_module_close($m);

	echo '<p>The session has been read. The value is "' . trim($data) .'"</p>';
} else {
	echo "<p>There's nothing to see here.</p>";
}

?>
</body>
</html>
