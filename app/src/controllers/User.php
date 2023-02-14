<?php
namespace App\Controllers;

use App\DAO\UserDaoImpl;
use App\DTO\UserDTO;

class User {
    private $UserDaoImpl;
    private $UserDTO;

    public function __construct()
    {
        print("Users!!!");
    }
}