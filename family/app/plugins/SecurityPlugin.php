<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;

class SecurityPlugin extends Plugin
{
    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        $controller = $dispatcher->getControllerName();
        $action = $dispatcher->getActionName();
        
        $allowed = true;
        
        if($allowed) {
            $dispatcher->forward(array(
                "controller"    => $controller,
                "action"        => $action
            ));
        }
    }
}