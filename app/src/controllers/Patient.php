<?php
namespace App\Controllers;

class Patient {
    private $container;
    private $PatientService;

    public function __construct($container)
    {
        $this->container = $container;
        $this->PatientService = $this->container['PatientService'];
    }

    public function getPatient($id) 
    {
        $patient = $this->PatientService->getPatient($id);

        header('Content-type: application/json');

        echo $patient;
    }

    public function getPatients() 
    {
        $patients = $this->PatientService->getPatients();

        header('Content-type: application/json');

        echo $patients;
    }

    /**
     * Calls PatientService and returns
     * the data as json to the client.
     */
    public function patientPrescribedCount($count)
    {
        $users = $this->PatientService->patientPrescribedCount($count);

        header('Content-type: application/json');

        echo $users;
    }
}