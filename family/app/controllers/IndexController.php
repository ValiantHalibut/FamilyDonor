<?php

class IndexController extends ControllerBase
{
    public function indexAction($logData)
    {
        if($logData) {
            $failNote = "<p class='logFail'>Login failed because: " . $logData . ". Please try again.</p>";
            $this->view->setVar("failNote", $failNote);
        }
    }
}