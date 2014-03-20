<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8' />
    <title>Namespace</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

require_once 'MyNamespace/Company/Company.php';

use MyNamespace\Company as C;

$hr = new C\Department('Accounting');

$e1 = new C\Employee('Justin Page');
$e2 = new C\Employee('Jeff Page');

$hr->addEmployee($e1);
$hr->addEmployee($e2);

unset($hr, $e1, $e2);

?>
</body>
</html>
