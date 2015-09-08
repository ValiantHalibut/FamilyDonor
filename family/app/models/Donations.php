<?php

use Phalcon\Mvc\Model;

class Donations extends Model
{
	function initialize()
	{
		$this->skipAttributes(array("date"));
	}

	protected $id;
	protected $name;
	protected $amount;
	protected $verified;
	protected $date;

	/* Getters */
	public function getId()
	{
		return $this->id;
	}
	public function getName()
	{
		return $this->name;
	}
	public function getAmount()
	{
		return $this->amount;
	}
	public function getVerified()
	{
		if($this->verified == 0) {
			return False;
		} else if ($this->verified == 1) {
			return True;
		} else {
			return "Something went wrong";
		}
	}
	public function getDate()
	{
		$dateData = date_parse($this->date);
		$returnVal = $dateData[month] . "/" . $dateData[day] . "/" . $dateData[year];
		return $returnVal;
	}

	/* Setters */
	public function setName($name)
	{
		$this->name = $name;
	}
	public function setAmount($amount)
	{
		$this->amount = $amount;
	}
	public function setVerified($verified)
	{
		$this->verified = $verified;
	}
}
