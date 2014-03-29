<?php

class Page
{
	protected $id          = null;
	protected $creatorId   = null;
	protected $title       = null;
	protected $content     = null;
	protected $dateAdded   = null;
	protected $dateUpdated = null;

	function getId()
	{
		return $this->id;
	}

	function getCreatorId()
	{
		return $this->creatorId;
	}

	function getTitle()
	{
		return $this->title;
	}

	function getContent()
	{
		return $this->content;
	}

	function getDateAdded()
	{
		return $this->dateAdded;
	}

	function getDateUpdated()
	{
		return $this->dateUpdated;
	}

	function getIntro($count = 200)
	{
		return substr(strip_tags($this->content), 0, $count) . '...';
	}
}
