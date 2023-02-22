<?php

namespace App\Controllers;

class Patient 
{
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
        $patient = (object)[
            'patient'
        ];
        header('Content-type: application/json');
        echo json_encode($patient);
    }

    /**
     * Calls PatientService and returns
     * the data as json to the client.
     */
    public function patientPrescribedCount($count)
    {
        $patients = $this->PatientService->patientPrescribedCount($count);
        $patients = (object)[
            'patients'
        ];

    
        header('Content-type: application/json');
        echo json_encode($patients);
    }
}