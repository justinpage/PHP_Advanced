#!/usr/bin/php
<?php

if ($_SERVER['argc'] === 2) {
	$file = $_SERVER['argv'][1];

	// make sure the file exists
	if (file_exists($file) && is_file($file)) {
		if ($data = file($file)) {
			echo "\nNumbering the file named '$file'...\n-----------------------\n\n";
			$n = 1;
			foreach ($data as $line) {
				echo "$n $line";
				$n++;
			}

			echo "\n-----------------\nEnd of file '$file'.\n";
			exit(0);
		} else {
			echo "The file could not be read.\n";
			exit(1);
		}
	} else {
		echo "The file does not exist.\n";
		exit(1);
	}
} else {
	echo "\nUsage: number2.php <filename>\n\n";
	exit(1);
}

