<?php

namespace App\Routes;

use Bramus\Router\Router;
use App\Controllers\Patient;

class Api 
{
    public function __construct(Router $router, $container)
    {
        $router->get('/patient/{id}', function($id) use ($container){
            $patient = $container['PatientController'];
            $patient->getPatient($id);
        });

        $router->get('/prescribed/{n}', function($n) use ($container){
            $patient = $container['PatientController'];
            $patients = $patient->patientPrescribedCount($n);
        });

        // Run it!
        $router->run();
    }
}
