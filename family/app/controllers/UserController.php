<?php

use Phalcon\Http\Request;

class UserController extends ControllerBase
{
    private function _registerSession($user)
    {
        $this->session->set('userType', $user->getType());
    }
    
    public function loginAction()
    {
        $responseText = 'fail';
        $forwardController = 'index';
        $forwardAction = 'index';

        $request = new Request();

        if($request->isPost()) {
            $password = $request->getPost('password');
            $userType = $request->getPost('userType');
            
            $user = Users::findFirst("type = '" . $userType . "'");
            if($user) {
                if($this->security->checkHash($password, $user->getPass())) {
                    $this->_registerSession($user);
                    $forwardController = $userType;
                } else {
                    $responseText = 'Invalid Password';
                }
            } else {
                $responseText = 'Invalid User';
            }
        }
        
        $this->dispatcher->forward(
            array(
                'controller'    => $forwardController,
                'action'        => $forwardAction,
                'params'        => array($responseText)
            )
        );
    }
    
    public function logoutAction()
    {
        $this->session->destroy();
        $this->response->redirect('');
    }
}