<?php

use App\Config\ContainerConfig;
// use App\Routes\API;


// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';


$container = ContainerConfig::create_container();

//init routes
$container["routes"];




