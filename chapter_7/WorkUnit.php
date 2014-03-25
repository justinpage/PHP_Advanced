<?php

abstract class WorkUnit
{
	protected $tasks = [];
	protected $name = null;

	function __construct($name)
	{
		$this->name = $name;
	}

	function getName()
	{
		return $this->name;
	}

	// abstract functions
	abstract function add(Employee $e);
	abstract function remove(Employee $e);
	abstract function assignTask($task);
	abstract function completeTask($task);
}

class Team extends WorkUnit
{
	private $_employees = [];

	function add(Employee $e)
	{
		$this->_employees[] = $e;
		echo "<p>{$e->getName()} has been added to team {$this->getName()}.</p>";
	}

	function remove(Employee $e)
	{
		$index = array_search($e, $this->_employees);
		unset($this->_employees[$index]);
		echo "<p>{$e->getName()} has been removed from team {$this->getName()}.</p>";
	}

	function assignTask($task)
	{
		$this->tasks[] = $task;
		echo "<p>A new task has been assigned to a team {$this->getName()}.It should be easy to do with {$this->getCount()} team member(s)</p>";
	}

	function completeTask($tasks)
	{
		$index = array_search($tasks, $this->tasks);
		unset($this->tasks[$index]);
		echo "<p>The '$tasks' task has been completed by team {$this->getName()}.</p>";
	}

	function getCount()
	{
		return count($this->_employees);
	}
}

class Employee extends WorkUnit
{
	function add(Employee $e) 
	{
		return false;
	}

	function remove(Employee $e)
	{
		return false;
	}

	function assignTask($task)
	{
		$this->tasks[] = $task;
		echo "<p>A new task has been assigned to {$this->getName()}. It will be done by {$this->getName()} alone.</p>";
	}

	function completeTask($task)
	{
		$index = array_search($task, $this->tasks);
		unset($this->tasks[$index]);
		echo "<p>The '$task' task has been completed by employee {$this->getName()}.</p>";
	}
}
