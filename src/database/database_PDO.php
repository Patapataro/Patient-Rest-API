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

