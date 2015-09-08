<?php

use Phalcon\Mvc\Model;

class Users extends Model
{
	protected $type;
	protected $pass;
	protected $id;

	/* Getters */
	public function getPass()
	{
		return $this->pass;
	}
	public function getType()
	{
		return $this->type;
	}
	public function getId()
	{
		return $this->id;
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
	public function setId($id)
	{
		$this->id = $id;
	}
}
