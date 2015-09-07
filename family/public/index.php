<?php
echo "This is family/public/index.php";
define ("APP_PATH", realpath("..") . "/");
echo "<br/>" . APP_PATH;


use Phalcon\Config\Adapter\Ini as ConfigIni;


$config = new ConfigIni(APP_PATH . "app/config/config.ini");
echo $config;