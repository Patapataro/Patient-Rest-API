<?php
namespace App\Service;

use App\DAO\PatientDaoImpl;
use App\DTO\PatientDTO;

class PatientService {

    private $PatientDaoImpl;
    private $PatientDTO;
    
    public function __construct(PatientDTO $PatientDaoImpl, PatientDTO $PatientDTO) 
    {
        $this->PatientDaoImpl = $PatientDaoImpl;
        $this->PatientDTO = $PatientDTO;
    }

    public function patient_prescribed_count($count)
    {
        var_dump($this->PatientDaoImpl
                ->get_all_patients()
                ->prescribed_gt_n($count)
                ->execute_query());
    }

}