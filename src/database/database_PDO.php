<?php 

class mysql_PDO {

public $connection;

// Variables below should be retrieved from .env file and hidden from git repo.

private $port;
private $host;
private $dbname;

private $user;
private $pass;

public function __construct() {

    $this->port = $_ENV['DB_PORT'];
    $this->host = $_ENV['DB_HOST'];
    $this->dbname = $_ENV['DB_NAME'];

    $this->user = $_ENV['DB_USER'];
    $this->pass = $_ENV['DB_PASSWORD'];

    $dsn = "mysql:host=$this->host;dbname=$this->dbname;port=$this->port";

    $options = [
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    ];

    try {
        $this->connection = new PDO($dsn, $this->user, $this->pass, $options);    
    }catch(PDOException $e)
    {
      echo $e->getMessage();                         
    } 
}


}

