<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Type Hinting</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php


class Department
{
	private $_name;
	private $_employees;
	function __construct($name)
	{
		$this->_name = $name;
		$this->_employees = [];
	}
	function addEmployee(Employee $e)
	{
		$this->_employees[] = $e;
		echo "<p>{$e->getName()} has been added to the {$this->_name} department.</p>";
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

unset($hr, $e1, $e2);

?>
</body>
</html>
