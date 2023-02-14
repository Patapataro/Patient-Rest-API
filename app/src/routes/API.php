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

        $router->get('/prescribed/{$n}', function() use ($container){
            $patient = $container['PatientController'];
            $patients = $patient->patient_prescribed_count();
            var_dump($patient);
        });

        // Run it!
        $router->run();
    }
}
