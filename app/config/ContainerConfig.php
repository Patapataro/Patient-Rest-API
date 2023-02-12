<?php

namespace App\Config;

use Pimple\Container;

use App\Database\DBAlConnection;

use Bramus\Router\Router;
use App\Routes\API;

class ContainerConfig {

    public static function create_container()
    {
        $container = new Container();

        // DI for Databse
        $container['database_connection'] = new DBAlConnection($_ENV["DB_DRIVER"], $_ENV["DB_HOST"], $_ENV["DB_NAME"], $_ENV["DB_USER"], $_ENV["DB_PASSWORD"]);
        

        // DI for routes
        $container["router"] = fn($c) => new Router();
        $container["routes"] = fn($c) => new API($c["router"]);


        return $container;

    }
}