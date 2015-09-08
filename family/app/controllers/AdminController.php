<?php

use Phalcon\Http\Request;

class AdminController extends ControllerBase
{
    public function indexAction() 
    {
        $donations = Donations::find();
        
        //$this->view->setVar('validIds', $validIds);
        $this->view->setVar('donations', $donations);
        
        $this->setDonationData();
    }
    
    public function updateAction()
    {
        $request = new Request();
        
        if($request->isPost()) {
            $donations = Donations::find();
            $validIds = $request->getPost();
            foreach($donations as $donation) {
                if(in_array($donation->getId(), $validIds)) {
                    $donation->setVerified(1);
                } else {
                    $donation->setVerified(0);
                }
                $donation->save();
            }
        }
        $this->dispatcher->forward(
            array(
                'controller'    => 'admin',
                'action'        => 'index'
                )
            );
    }
    
    public function setupAction()
    {
        $request = new Request();
        
        if($request->isPost()) {
            $password = $request->getPost('password');
            $userType = $request->getPost('userType');
            
            $user = Users::findFirst("type = '" . $userType . "'");
            
            if(!$user) {
                $user = new Users();
                $user->setType($userType);
            }
            
            $user->setPass($this->security->hash($password));
            
            $user->save();
        }
    }
}