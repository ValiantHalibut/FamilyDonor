<?php

use Phalcon\Mvc\Controller;

class ControllerBase extends Controller
{
    public function initialize()
    {
        $this->assets
                ->addCss("public/css/project.css")
                ->addJs("public/js/project.js");
    }
    
    public function setDonationData()
    {
        $donationTotals = DonationTotals::findFirst();
        
        $goal = 1500;
        $confirmed = $donationTotals->getVerified();
        $promised = $donationTotals->getPromised();
        
        $this->view->setVars(array(
            'goal'      => $goal,
            'confirmed' => $confirmed,
            'promised'  => $promised
        ));
    }
}