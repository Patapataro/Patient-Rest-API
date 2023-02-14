<?php
namespace App\Controllers;

class Patient {
    private $container;
    private $UserService;

    public function __construct($container)
    {
        $this->container = $container;
        $this->UserService = $this->container['PatientService'];
    }

    public function patient_prescribed_count($count)
    {
        $users = $this->UserService->patient_prescribed_count($count);

        header('Content-type: application/json');

        echo json_encode($users);

    }
}