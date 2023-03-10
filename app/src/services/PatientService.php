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
        $patientDTO = $this::arrToDto($patient);

        return $patientDTO;
    }

    public function patientPrescribedCount($n)
    {
        $patients = $this->PatientDAO->getByPrescribedCount($n);
        $patientDTOs = $this::mapPatientArray($patients);

        return $patientDTOs;
    }
       
    /**
     * Maps a patent arrays to array of patent DTO
     */
    private static function mapPatientArray($userArrays): array
    {
        $userDTOs = array_map(function($userArray) {
            $PatientDTO = new PatientDTO();
            $PatientDTO->ID = $userArray['ID'];
            $PatientDTO->name = $userArray['NAME'];
            return $PatientDTO;
        }, $userArrays);

        return $userDTOs;
    }

    /**
     * Maps a single patient array to a patent DTO
     */
    public static function arrToDto($userArray): PatientDTO
    {
        $PatientDTO = new PatientDTO();
        $PatientDTO->ID = $userArray['ID'];
        $PatientDTO->name = $userArray['NAME'];

        return $PatientDTO;
    }
}