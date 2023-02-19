<?php

namespace App\Services;

use App\DAO\PatientDAO;
use App\DTO\PatientDTO;

class PatientService 
{
    private $PatientDAO;
    
    public function __construct(PatientDAO $PatientDAO) 
    {
        $this->PatientDAO = $PatientDAO;
    }

    public function getPatient($id)
    {
        $patient = $this->PatientDAO->read($id);
        return json_encode($patient);
    }

    public function getPatients()
    {
        $patients = $this->PatientDAO->getAll();
        return json_encode($patients);
    }

    public function patientPrescribedCount($n)
    {
        $patients = $this->PatientDAO->prescribedGtN($n);
        return json_encode($patients);
    }
}