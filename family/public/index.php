<?php
echo "This is family/public/index.php";
define ("APP_PATH", realpath("..") . "/");


use Phalcon\Config\Adapter\Ini as ConfigIni;


$configPath = APP_PATH . "app/config/config.ini";
echo $configPath;
$config = new ConfigIni(APP_PATH . "app/config/config.ini");
echo $config;