<?php

class User
{
	protected $id        = null;
	protected $userType  = null;
	protected $username  = null;
	protected $email     = null;
	protected $pass      = null;
	protected $dateAdded = null;

	function getId()
	{
		return $this->id;	
	}

	function isAdmin()
	{
		return ($this->userType === 'admin');
	}


	function canEditPage()
	{
		return ($this->isAdmin() || ($this->id === $page->getCreatorId()));
	}


	function canCreatePage()
	{
		return ($this->isAdmin() || ($this->userType === 'author'));
	}
}
