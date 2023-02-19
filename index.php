<?php
/**
 * Entry point to the app creates the DI container and 
 * calls the routesto handle requests.
 */

use App\Config\ContainerConfig;


// Require composer autoloader
require __DIR__ . '/vendor/autoload.php';


// Load .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();


$container = ContainerConfig::createContainer();

//init routes
$container["routes"];