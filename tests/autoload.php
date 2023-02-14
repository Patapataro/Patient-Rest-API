<?php
/** 
Load tests in CLI
./vendor/bin/phpunit --configuration phpunit.xml --testdox 
*/

// include_once __DIR__.'/../index.php';
include_once __DIR__.'/../vendor/autoload.php';


$classLoader = new \Composer\Autoload\ClassLoader();
$classLoader->addPsr4("Test\\", "tests/");
$classLoader->addPsr4("Test\\Patient\\", "tests/patient/");
$classLoader->addPsr4("Test\\Database\\", "test/database/");
$classLoader->register();

// // Load .env
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__."/..");
$dotenv->load();


$GLOBALS['db_driver'] =  $_ENV['DB_DRIVER'];
$GLOBALS['db_user'] = $_ENV['DB_USER'];
$GLOBALS['db_password'] = $_ENV['DB_PASSWORD'];
$GLOBALS['db_host'] = $_ENV['DB_HOST'];
$GLOBALS['db_dbname'] = $_ENV['DB_NAME'];
$GLOBALS['db_port'] = $_ENV['DB_PORT'];



// Do not load router. The Router will start looking for a request and return warnings when one is not found.
