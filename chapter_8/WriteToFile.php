<?php

class FileException extends Exception
{
	function getDetails()
	{
		switch ($this->code) {
			case 0:
				return 'No filename was provided.';
				break;
			case 1:
				return 'The file does not exist.';
				break;
			case 2:
				return 'The file is not a file.';
				break;
			case 3:
				return 'The file is not writable.';
				break;
			case 4:
				return 'An invalid mode was provided.';
				break;
			case 5:
				return 'The data could not be written.';
				break;
			case 6:
				return 'The file could not be closed.';
				break;
			default:
				return 'No further information is available.';
				break;
		}
	}
}

class WriteToFile
{
	private $_fp = null;
	private $_message = '';

	function __construct($file = null, $mode = 'w')
	{
		$this->_message = "File: $file Mode: $mode";

		if(empty($file)) throw new FileException($this->_message, 0);

		if(!file_exists($file)) throw new FileException($this->_message, 1);

		if(!is_file($file)) throw new FileException($this->_message, 2);

		if(!is_writable($file)) throw new FileException($this->_message, 3);

		if(!in_array($mode, ['a', 'a+', 'w', 'w+'])) throw new FileException($this->_message, 4);

		$this->_fp = fopen($file, $mode);
	}

	function write($data)
	{
		if (@!fwrite($this->_fp, $data . "\n")) throw new FileException($this->_message . " Data: $data", 5);
	}

	function close()
	{
		if ($this->_fp) {
			if(@!fclose($this->_fp)) throw new FileException($this->_message, 6);
			$this->_fp = null;
		}
	}

	function __destruct()
	{
		$this->close();
	}
}
