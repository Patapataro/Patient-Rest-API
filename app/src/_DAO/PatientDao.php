<?php

namespace App\DAO;

use App\DTO\PatientDTO;

interface PatientDao 
{
    public function create(PatientDTO $user);
    public function read(int $id): ?PatientDTO;
    public function update(User $user): bool;
    public function delete(int $id): bool;

    /**
     * Return an array of PatientDTO.
     * 
     * @return array<PatientDTO>
     */
    public function getByPrescribedCount(int $count): ?array;
}