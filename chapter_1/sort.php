<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Sorting Multidimensional Arrays</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php # Script

	$students = [
	256 => ['name' => 'Justin', 'grade' => 98.5],
	2   => ['name' => 'Jeff', 'grade'   => 85.1],
	9 => ['name' => 'Bob', 'grade'    => 94.5],
	364 => ['name' => 'Mike', 'grade'   => 92.5],
	68 => ['name' => 'Steve', 'grade'  => 78.5],
	];


	echo "<h2>Array As Is</h2><pre>" . print_r($students, 1) . "</pre>";

	// name sort:
	uasort($students, function($x, $y) {
		static $count = 1;
		echo "<p>Iteration $count: {$x['name']} vs. {$y['name']}</p>\n";
		$count++;
		return strcasecmp($x['name'], $y['name']);
	});
	echo "<h2>Array Sorted</h2><pre>" . print_r($students, 1) . "</pre>";

	// grade sort:
	uasort($students, function($x, $y) {
		static $count = 1;
		echo "<p>Iteration $count: {$x['grade']} vs. {$y['grade']}</p>\n";
		$count++;
		return ($x['grade'] < $y['grade']);
	});
	echo "<h2>Array Sorted</h2><pre>" . print_r($students, 1) . "</pre>";
?>
</body>
</html>
