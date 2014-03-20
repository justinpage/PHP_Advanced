<!DOCTYPE html>
<html lang='en'>
<head>
	<meta charset='UTF-8' />
	<title>Interface</title>
	<link href='bootstrap.min.css' rel='stylesheet' />
</head>
<body>
<?php


interface iCrud
{
	public function create($data);
	public function read();
	public function update($data);
	public function delete();
}

class User implements iCrud
{
	private $_userId = null;
	private $_username = null;

	function __construct($data)
	{
		$this->_userId = uniqid();
		$this->_username = $data['username'];
	}

	function create($data)
	{
		self::__construct($data);
	}

	function read() 
	{
		return ['userId' => $this->_userId, 'username' => $this->_username];
	}

	function update($data)
	{
		$this->_username = $data['username'];
	}

	function delete() 
	{
		$this->_username = null;
		$this->_userId = null;
	}
}

$user = ['username' => 'trout'];

echo "<h2>Creating a New User</h2>";

$me = new User($user);

$info = $me->read();
echo "<p>The user ID is {$info['userId']}.</p>";

$me->update(['username' => 'KLVTZ']);

$info = $me->read();
echo "<p>The user name is now {$info['username']}.</p>";

$me->delete();
unset($me);

?>
</body>
</html>
