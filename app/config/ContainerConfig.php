<?php

namespace App\Config;

use Pimple\Container;

use App\Database\DBAlConnection;

use Bramus\Router\Router;
use App\Routes\API;

use App\DAO\UserDaoImpl;
use App\DTO\UserDTO;
use App\Controllers\User;

class ContainerConfig {

    public static function create_container()
    {
        $container = new Container();

        // DI for Databse
        $container['database_connection'] = new DBAlConnection($_ENV['DB_DRIVER'], $_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $container['database_connection'] = $container['database_connection']->get_connection();

        // DI for routes
        $container['router'] = fn($c) => new Router();
        $container['routes'] = fn($c) => new API($c['router'], $c);

        // User
        $container['UserDaoImpl'] = fn($c) => new UserDaoImpl($c['database_connection']);
        $container['UserCTO'] = fn($c) => new UserDTO();
        $container['UserController'] = fn($c) => new User($c['UserDaoImpl'], $c['UserCTO']);



        return $container;

    }
}