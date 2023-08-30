<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'config.php';
require_once 'autoload.php';


$router = new app\Router();
$router->run();