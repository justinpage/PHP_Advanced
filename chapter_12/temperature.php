#!/usr/bin/php
<?php

echo "\nEnter a temperature and indicate if it's Fahrenheit or Celsius [##.# C/F]: ";
if (fscanf(STDIN, '%f %s', $temp_i, $which_i) == 2) {

	// assume invalid output:
	$which_o = false;

	// make the conversion based upon $which_i
	switch (trim($which_i)) {

		// Celsius convert to Fahrenheit
		case 'C':
		case 'c':
			$temp_o = ($temp_i * (9.0/5.0)) + 32;
			$which_o = 'F';
			$which_i = 'C';
			break;

			// Fahrenheit convert to Celsius
		case 'F':
		case 'f':
			$temp_o = ($temp_i - 32) * (5.0/9.0);
			$which_o = 'C';
			$which_i = 'F';
			break;
	}

	if ($which_o) {
		printf("%0.1f %s is %0.1f %s.\n", $temp_i, $which_i, $temp_o, $which_o);
	} else {
		echo "You failed to enter C or F to indicate the current temperature type.\n";
	}
} else {
	echo "You failed to use proper syntax.\n";
}

?>
