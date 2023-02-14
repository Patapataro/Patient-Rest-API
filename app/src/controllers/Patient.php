<?php
namespace App\Controllers;

class Patient {
    private $container;
    private $UserService;

    public function __construct($container)
    {
        $this->container = $container;
        $this->UserService = $this->container['PatientController'];
    }

    public function patient_prescribed_count($count)
    {
        var_dump($this->UserService->patient_prescribed_count($count));
    }
}