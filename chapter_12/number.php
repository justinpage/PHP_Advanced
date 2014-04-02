#!/usr/bin/php
<?php
$file = 'states.txt';

echo "\nNumbering the file named '$file'...
-------------------\n\n";

// Read in the file
$data = file($file);

// line number counter
$n = 1;

foreach ($data as $line) {
	echo "$n $line";
	$n++;
}

echo "\n-----------------
End of file '$file'.\n"
?>
