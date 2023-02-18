<?php
/**
 * The DI Container defines how classes should be
 * called and instantiates them when needed.
 */

namespace App\Config;

use Pimple\Container;

use App\Database\DoctrineDBAl;

use Bramus\Router\Router;
use App\Routes\Api;

use App\DAO\PatientDaoImpl;
use App\Services\PatientService;
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
        $container['routes'] = fn($c) => new Api($c['router'], $c);

        // DI for Patient
        $container['PatientDaoImpl'] = fn($c) => new PatientDaoImpl($c['database_connection']);
        $container['PatientService'] = fn($c) => new PatientService($c['PatientDaoImpl']);
        $container['PatientController'] = fn($c) => new Patient($c);

        return $container;

    }
}