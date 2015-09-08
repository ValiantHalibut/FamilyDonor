<?php

use Phalcon\Mvc\Model;

class DonationTotals extends Model
{
	protected $totalVerified;
	protected $totalPromised;

	public function getVerified()
	{
		return $this->totalVerified;
	}
	public function getPromised()
	{
		return $this->totalPromised;
	}
}
