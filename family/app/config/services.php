<?php

use Phalcon\Mvc\View;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Postgresql as DbAdapter;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Events\Manager as EventsManager;

$di = new FactoryDefault();

$di->set("dispatcher", function() use ($di) {
    $eventsManager = new EventsManager;
    
    $eventsManager->attach("dispatch:beforeDispatch", new SecurityPlugin);
    
    $eventsManager->attach("dispatch:beforeException", new NotFoundPlugin);
    
    $dispatcher = new Dispatcher;
    $dispatcher->setEventsManager($eventsManager);
    
    return $dispatcher;
});