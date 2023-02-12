<?php

namespace App\Routes;
use Bramus\Router\Router;


class API {
    public function __construct(Router $router)
    {
        // Define routes
        $router->get('/', function(){
            print("Hello");
        });

        // Run it!
        $router->run();
    }
}
