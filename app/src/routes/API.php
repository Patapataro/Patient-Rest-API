<?php

namespace App\Routes;
use Bramus\Router\Router;
use App\Controllers\Users;


class API {
    public function __construct(Router $router, $container)
    {
        // var_dump($container);
        // var_dump($container['UserDAO']);
        // Define routes
        $router->get('/', function() use ($container){
            print("Hello");
        });

        $router->get('/users', function() use ($container){
            $user = $container['UserDaoImpl'];
            $users = $user->get_all_users();
            var_dump($users);
        });

        // Run it!
        $router->run();
    }
}
