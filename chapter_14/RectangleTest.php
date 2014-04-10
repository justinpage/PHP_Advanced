<?php
require_once 'vendor/autoload.php';

class RectangleTest extends PHPUnit_Framework_TestCase
{
	protected $r;

	// create an object to use
	function setUp()
	{
		$this->r = new Rectangle(8, 9);
	}

	function testGetArea()
	{
		$this->assertEquals(72, $this->r->getArea());
	}

	function testGetPerimeter()
	{
		$this->assertEquals(34, $this->r->getPerimeter());
	}

	function testIsSquare()
	{
		$this->assertFalse($this->r->isSquare());

		$this->r->setSize(5,5);
		$this->assertTrue($this->r->isSquare());
	}

	function testSetSize()
	{
		$w = 5;
		$h = 8;
		$this->r->setSize($w, $h);
		$this->assertEquals($w, $this->r->width);
		$this->assertEquals($h, $this->r->height);
	}

}
