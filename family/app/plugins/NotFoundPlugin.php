<?php

use Phalcon\Events\Event;
use Phalcon\Mvc\User\Plugin;
use Phalcon\Mvc\Dispatcher;

class NotFoundPlugin extends Plugin
{
    public function beforeDispatch(Event $event, Dispatcher $dispatcher)
    {
        
    }
}

