<?php

// include_once __DIR__.'/../index.php';
include_once __DIR__.'/../vendor/autoload.php';


$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("Test\\", "tests/");
$classLoader->register();

// // Load .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/..");
$dotenv->load();



// Do not load router. The Router will start looking for a request and return warnings when one is not found.
