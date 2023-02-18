<?php
/**
 * Patient Service uses DTO and DAO to pass patient Objects
 * to and from the database layer and controller.
 */

namespace App\Services;

// use App\DAO\PatientDaoImpl;
use App\DAO\PatientDAO;
use App\DTO\PatientDTO;

class PatientService {

    private $PatientDAO;
    
    public function __construct(PatientDAO $PatientDAO) 
    {
        $this->PatientDAO = $PatientDAO;
    }

    public function getPatient($id)
    {
        $patient = $this->PatientDAO->read($id);
        // var_dump($user);
        return json_encode($patient);
    }

    public function getPatients()
    {
        $patients = $this->PatientDAO->getAll();
        return json_encode($patients);
    }



    /**
    * PatientDTO object is not used in this method, it will complicate the data on return.
    * The PatientDTO is better used to help us orginize and hold patient data for create and update methods.
    * 
    * The mothod describes the data needed from the DAO
    */
    public function patientPrescribedCount($n)
    {
        $patients = $this->PatientDAO->prescribedGtN($n);
        return json_encode($patients);
    }

}