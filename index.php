<?php

use App\Config\ContainerConfig;


// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';


// Load .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$container = ContainerConfig::create_container();

//init routes
$container["routes"];
// new API($container);



