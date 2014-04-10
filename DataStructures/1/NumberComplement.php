<?php

echo "\nEnter an integer for its inverted complement: ";

/**
 * Scan input from command-line, make sure the input has value,
 * send input to accompanying function and output inverted compliment
 */
if ( 1 === fscanf(STDIN, '%d', $input)) {
	$comp = getIntegerComplement($input);
	echo "\nThe inverted compliment of $input is: $comp\n";
}

/**
 * getIntegerComplement will take a current input,
 * convert the input to a string value of boolean numbers.
 * grab the current length of that boolean string,
 * save space for the exponent and decimal value.
 *
 * for loop will increment through the current string, casting each value
 * to an integer, and then check to see if that value is zero.
 * We are only concerned for falsey inverted values for proper complement.
 * Concatenate current decimnal value with properly raised exponents.
 *
 * @param int $input
 * @int $dec
 */
function getIntegerComplement($input) {
	$bin = decbin($input);
	$len = strlen($bin);
	$exp = $len - 1;
	$dec = null;

	for ($i = 0; $i < $len; $i++) {
		$num = (int) $bin[$i];
		if(0 === $num) $dec += pow(2, $exp);
		$exp--;
	}

	return $dec;
}
