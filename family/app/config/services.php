<?php

use Phalcon\Mvc\View;
use Phalcon\DI\FactoryDefault;
use Phalcon\Mvc\Url;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Db\Adapter\Pdo\Postgresql as DbAdapter;
use Phalcon\Session\Adapter\Files as Session;
use Phalcon\Events\Manager as EventsManager;

$di = new FactoryDefault();

$di->set("dispatcher", function() {
    $eventsManager = new EventsManager;
    
    $eventsManager->attach("dispatch:beforeDispatch", new SecurityPlugin);
    
    $eventsManager->attach("dispatch:beforeException", new NotFoundPlugin);
    
    $dispatcher = new Dispatcher;
    $dispatcher->setEventsManager($eventsManager);
    
    return $dispatcher;
});

$di->set("url", function() use($config) {
    $url = new Url();
    $url->setBaseUri($config->application->baseUri);
    return $url;
});

$di->set("view", function() use($config) {
    $view = new View();
    $view->setViewsDir(APP_PATH . $config->application->viewsDir);
    return $view;
});

$di->setShared("session", function() {
    $session = new Session();
    $session.start();
    return $session;
});

$di->set("db", function() use ($config) {
    //$dbadapter = "Phalcon\Db\Adapter\Pdo\\" . $config->database->adapter;
    return new DbAdapter(array(
        "host"      => $config->database->host,
        "username"  => $config->database->username,
        "password"  => $config->database->password,
        "dbname"    => $config->database->name
    ));
});