<?php

$loader = new \Phalcon\Loader();

// register a set of directories from the configutation file

$loader->registerDirs(
        array(
            APP_PATH . $config->application->controllersDir,
            APP_PATH . $config->application->pluginsDir,
            APP_PATH . $config->application->modelsDir,
        )
    )->register();