<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;

class SecurityPlugin extends Plugin
{
    public function beforeDispatch(Event $event, Dispatcher $dispatch)
    {
        return true;
    }
}