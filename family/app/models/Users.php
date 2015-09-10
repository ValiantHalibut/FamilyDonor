<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
    function initialize()
	{
		$this->skipAttributes(array("id"));
	}
        
	protected $type;
	protected $pass;

	/* Getters */
	public function getPass()
	{
		return $this->pass;
	}
	public function getType()
	{
		return $this->type;
	}

	/* Setters */
	public function setPass($pass)
	{
		$this->pass = $pass;
	}
	public function setType($type)
	{
		$this->type = $type;
	}
}
