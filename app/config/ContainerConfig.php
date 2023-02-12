<?php

namespace App\Config;

use Pimple\Container;
use Bramus\Router\Router;
use App\Routes\API;

class ContainerConfig {

    public static function create_container()
    {
        $container = new Container();

        // DI for routes
        $container["router"] = fn($c) => new Router();
        $container["routes"] = fn($c) => new API($c["router"]);


        
        return $container;

    }
}