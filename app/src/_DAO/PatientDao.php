<?php

namespace App\DAO;

use App\DTO\PatientDTO;

interface PatientDao 
{
    public function create(PatientDTO $patient): bool;
    /**
     * Returns a single Patient as an associative array
     */

    public function read(int $id): ?array;

    public function update(PatientDTO $patient): bool;

    public function delete(int $id): bool;
    
    /**
     * Return an array of PatientDTO.
     * 
     * @return array
     */
    public function getByPrescribedCount(int $count): ?array;
}