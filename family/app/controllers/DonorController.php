<?php

use Phalcon\Http\Request;

class DonorController extends ControllerBase
{
    public function indexAction()
    {
        echo "hello";
        $request = new Request();
        
        if($request->isPost()) {
            $name = $request->getPost('name');
            $amount = $request->getPost('amount');
            
            $donation = new Donations();
            $donation->setName($name);
            $donation->setAmount($amount);
            $donation->setVerified(0);
            $donation->save();
        }
        echo "World";
        $this->setDonationData();
    }
}