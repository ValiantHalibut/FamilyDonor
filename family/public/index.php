<?php
echo "This is family/public/index.php <br />";

use Phalcon\Config\Adapter\Ini as ConfigIni;
use Phalcon\Mvc\Application;

try {
    define ("APP_PATH", realpath("..") . "/");

    $config = new ConfigIni(APP_PATH . "app/config/config.ini");

    require APP_PATH . "app/config/loader.php";

    require APP_PATH . "app/config/services.php";

    $application = new Application($di);
    echo "Next step: application";

    echo $application->handle()->getContent();
} catch(Exception $e) {
    echo $e->getMessage();
}