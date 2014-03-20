<?php

class Rectangle 
{
	use tDebug;
	public $width = 0;
	public $height = 0;

	function __construct($w = 0, $h = 0) 
	{
		$this->width = $w;
		$this->height = $h;
	}

	function setSize($w = 0, $h = 0)
	{
		$this->width = $w;
		$this->height = $h;
	}

	function getArea() 
	{
		return ($this->width * $this->height);
	}

	function getPerimeter() 
	{
		return (($this->width + $this->height) * 2);
	}

	function isSquare()
	{
		if ($this->width === $this->height) return true;
		return false;
	}
}
