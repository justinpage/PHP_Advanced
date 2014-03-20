<?php

$a = [
	['key1' => 940, 'key2' => 'blah'],
	['key1' => 23, 'key2' => 'this'],
	['key1' => 894, 'key2' => 'that']
];

/* die(var_dump($a)); */

function asc_numbe_sort($x, $y) {
	if ($x['key1'] > $y['key1']) {
		return true;
	} elseif ($x['key1'] < $y['key1']) {
		return false;
	} else 
		return 0;
}

/* usort($a, 'asc_numbe_sort'); */

// die(var_dump($a));

function string_sort($x, $y) {
	return strcasecmp($x['key2'], $y['key2']);
}

usort($a, 'string_sort');
die(var_dump($a));
