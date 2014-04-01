<?php session_start(); ?>
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <title>A More Secure Session</title>
</head>
<body>
<?php

$key = md5('77 public drop-shadow Java');
$data = 'rosebud';

// open the cipher:
// Using Rijndael 256 in CBC mode
$m = mcrypt_module_open('rijndael-256', '', 'cbc', '');

// create the IV
// Use MCRYPT_RAND on Windows instead of MCRYPT_DEV_RANDOM
$iv = mcrypt_create_iv(mcrypt_enc_get_iv_size($m), MCRYPT_DEV_RANDOM);

// init the encryption
mcrypt_generic_init($m, $key, $iv);

// encrypt the data:
$data = mcrypt_generic($m, $data);

mcrypt_generic_deinit($m);
mcrypt_module_close($iv);


$_SESSION['thing1'] = base64_encode($data);
$_SESSION['thing2'] = base64_encode($iv);

echo "<p>The data has been stored. It's value is " . base64_encode($data) . ".</p>";
echo "<a href=read_mcrypt.php>Read the stored value</a>"

?>
</body>
</html>
