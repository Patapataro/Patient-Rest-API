<?php
/**
 * Patient Service uses DTO and DAO to pass patient Objects
 * to and from the database layer and controller.
 */

namespace App\Services;

use App\DAO\PatientDaoImpl;
use App\DTO\PatientDTO;

class PatientService {

    private $PatientDaoImpl;
    private $PatientDTO;
    
    public function __construct(PatientDaoImpl $PatientDaoImpl, PatientDTO $PatientDTO) 
    {
        $this->PatientDaoImpl = $PatientDaoImpl;
        $this->PatientDTO = $PatientDTO;
    }

    /**
    * PatientDTO object is not used in this method, it will complicate the data on return.
    * The PatientDTO is better used to help us orginize and hold patient data for create and update methods.
    * 
    * The mothod describes the data needed from the DAO
    */

    public function patient_prescribed_count($count)
    {
        $users = $this->PatientDaoImpl
                ->get_all_patients()
                ->prescribed_gt_n($count)
                ->execute_query();
        return $users;
    }

}