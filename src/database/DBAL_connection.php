<?php
namespace App\database;

use Doctrine\DBAL\DriverManager;

class DBAL_connection {
    private $connection;

    // private $port;
    private $host;
    private $dbname;
    private $driver;

    private $user;
    private $pass;

    public function __construct() {

        // $this->port = $_ENV['DB_PORT'];
        $this->host = $_ENV['DB_HOST'];
        $this->dbname = $_ENV['DB_NAME'];
    
        $this->user = $_ENV['DB_USER'];
        $this->pass = $_ENV['DB_PASSWORD'];

        $connectionParams = [
            'dbname' => $this->dbname,
            'user' => $this->user,
            'password' => $this->pass,
            'host' => $this->host,
            'driver' => $this->driver ?? 'pdo_mysql',
        ];

        return $this->connection = DriverManager::getConnection($connectionParams);
        
    }
}

