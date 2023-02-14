<?php

namespace App\Routes;
use Bramus\Router\Router;
use App\Controllers\Patient;


class API {
    public function __construct(Router $router, $container)
    {
        /**
         * Passes the prescription count to the PatientController 
         */
        $router->get('/prescribed/{n}', function($n) use ($container){
            $patient = $container['PatientController'];
            $patients = $patient->patient_prescribed_count($n);
        });

        // Run it!
        $router->run();
    }
}
