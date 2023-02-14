<?php

namespace App\Routes;
use Bramus\Router\Router;
use App\Controllers\Patient;


class API {
    public function __construct(Router $router, $container)
    {
        // var_dump($container);
        // var_dump($container['UserDAO']);
        // Define routes
        $router->get('/', function() use ($container){
            print("Hello");
        });

        $router->get('/patient', function() use ($container){
            $patient = $container['PatientDaoImpl'];
            $patients = $patient->get_all_patient();
            var_dump($patient);
        });

        // Run it!
        $router->run();
    }
}
