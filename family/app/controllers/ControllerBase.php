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
    
    public function setDonationDate()
    {
        echo "1";
        $donationTotals = DonationTotals::findFirst();
        echo "2";
        $goal = 1500;
        $confirmed = $donationTotals->getVerified();
        $promised = $donationTotals->getPromised();
        echo "3";
        $this->view->setVars(array(
            'goal'      => $goal,
            'confirmed' => $confirmed,
            'promised'  => $promised
        ));
    }
}