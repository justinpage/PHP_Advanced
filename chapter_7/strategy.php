<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Composite</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php

require_once 'iSort.php';

class StudentsList
{
	private $_students = [];

	function __construct($list)
	{
		$this->_students = $list;
	}

	function sort(iSort $type)
	{
		$this->_students = $type->sort($this->_students);
	}

	function display()
	{
		echo "<ol>";
		foreach ($this->_students as $student) {
			echo "<li>{$student['name']} {$student['grade']}</li>";
		}
		echo "</ol>";
	}
}

$students = [
	256 => ['name' => 'Jon', 'grade'     => 98.5],
	3   => ['name' => 'Vance', 'grade'   => 85.1],
	9   => ['name' => 'Stephen', 'grade' => 94.0],
	364 => ['name' => 'Steve', 'grade'   => 85.1],
	69  => ['name' => 'Rob', 'grade'     => 74.6],
];

$list = new StudentsList($students);

echo "<h2>Original Array</h2>";
$list->display();

$list->sort(new MultiAlphaSort('name'));
echo "<h2>Sorted by Name</h2>";
$list->display();

$list->sort(new MultiNumberSort('grade', 'descending'));
echo "<h2>Sorted by Grade</h2>";
$list->display();

unset($list);
?>
</body>
</html>
