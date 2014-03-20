<?php namespace MyNamespace\Company;

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
