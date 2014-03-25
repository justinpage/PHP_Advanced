<?php

class Config
{
	static private $_instance = null;
	private $_settings = [];

	private function __construct() {}
	private function __clone() {}

	static function getInstance()
	{
		if (self::$_instance == null) {
			self::$_instance = new self();
		}

		return self::$_instance;
	}

	function set($index, $value)
	{
		$this->_settings[$index] = $value;
	}

	function get($index)
	{
		return $this->_settings[$index];
	}
}
