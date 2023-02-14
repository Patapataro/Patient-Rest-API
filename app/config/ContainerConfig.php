<?php

namespace App\Config;

use Pimple\Container;

use App\Database\DoctrineDBAl;

use Bramus\Router\Router;
use App\Routes\API;

use App\DAO\PatientDaoImpl;
use App\DTO\PatientDTO;
use App\Service\PatientService;
use App\Controllers\Patient;

class ContainerConfig {

    public static function create_container()
    {
        $container = new Container();

        // DI for Databse
        $container['database_manager'] = new DoctrineDBAl($_ENV['DB_DRIVER'], $_ENV['DB_HOST'], $_ENV['DB_NAME'], $_ENV['DB_USER'], $_ENV['DB_PASSWORD']);
        $container['database_connection'] = $container['database_manager']->get_connection();

        // DI for routes
        $container['router'] = fn($c) => new Router();
        $container['routes'] = fn($c) => new API($c['router'], $c);

        // Patient
        $container['PatientDaoImpl'] = fn($c) => new PatientDaoImpl($c['database_connection']);
        $container['PatientCTO'] = fn($c) => new PatientDTO();
        $container['PatientService'] = fn($c) => new PatientService($c['PatientDaoImpl'], $c['PatientCTO']);
        $container['PatientController'] = fn($c) => new Patient($c);



        return $container;

    }
}