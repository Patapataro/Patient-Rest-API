<?php
namespace App\Controllers;

use App\DAO\PatientDaoImpl;
use App\DTO\PatientDTO;

class Patient {
    private $PatientDaoImpl;
    private $PatientDTO;

    public function Patient()
    {
        print("Patient!!!");
    }
}