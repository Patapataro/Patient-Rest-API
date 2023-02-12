<?php
namespace App\DAO;

class UserDAO {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }
}