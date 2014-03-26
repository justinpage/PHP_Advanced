<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Type Hinting</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php


class Department implements Iterator
{
	private $_name;
	private $_employees;

	private $_postion = 0;

	function __construct($name)
	{
		$this->_name = $name;
		$this->_employees = [];
		$this->_position = 0;
	}

	function addEmployee(Employee $e)
	{
		$this->_employees[] = $e;
		echo "<p>{$e->getName()} has been added to the {$this->_name} department.</p>";
	}

	function current()
	{
		return $this->_employees[$this->_position];
	}

	function key()
	{
		return $this->_position;
	}

	function next()
	{
		$this->_position++;
	}

	function rewind()
	{
		$this->_position = 0;
	}

	function valid()
	{
		return (isset($this->_employees[$this->_position]));
	}
}

class Employee
{
	private $_name;
	function __construct($name)
	{
		$this->_name = $name;
	}
	function getName()
	{
		return $this->_name;
	}
}

$hr = new Department('Human Resources');

$e1 = new Employee('Jane Doe');
$e2 = new Employee('John Doe');

$hr->addEmployee($e1);
$hr->addEmployee($e2);

echo "<h2>Department Employees</h2>";
foreach ($hr as $e) {
	echo "<p>{$e->getName()}</p>";
}

unset($hr, $e1, $e2);

?>
</body>
</html>
