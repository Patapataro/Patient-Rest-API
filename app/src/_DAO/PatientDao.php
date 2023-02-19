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
     * Returns all users.
     * 
     * @return array<PatientDTO>
     */
    public function getAll(): ?array;

    /**
     * Return an array of PatientDTO.
     * 
     * @return array<PatientDTO>
     */
    public function prescribedGtN(int $n): ?array;
}