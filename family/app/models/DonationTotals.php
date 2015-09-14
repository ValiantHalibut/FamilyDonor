<?php

use Phalcon\Mvc\Model;

class DonationTotals extends Model
{
    protected $totalverified;
    protected $totalpromised;

    public function getVerified()
    {
	return $this->totalverified;
    }
    public function getPromised()
    {
	return $this->totalpromised;
    }
}
