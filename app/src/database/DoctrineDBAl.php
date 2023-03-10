<?php

namespace App\Database;

use Doctrine\DBAL\DriverManager;

class DoctrineDBAl 
{
    private $connection;

    public function __construct($db_driver, $db_host, $db_name, $username, $password) 
    {
        $connectionParams = [
            'dbname' => $db_name,
            'user' => $username,
            'password' => $password,
            'host' => $db_host,
            'driver' => $db_driver ?? 'pdo_mysql',
        ];

        $this->connection = DriverManager::getConnection($connectionParams);
    }

    public function getConnection(){
        return $this->connection;
    }
}