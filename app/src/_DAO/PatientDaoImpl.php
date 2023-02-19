<?php 

declare(strict_types=1);

namespace App\DAO;

use App\DAO\PatientDao;
use App\DTO\PatientDTO;
use App\DAO\PatientDaoImpl;

class PatientDaoImpl implements PatientDAO
{
    private $connection;

    public function __construct($connection) 
    {
        $this->connection = $connection;
    }

    public function create(PatientDTO $user)
    {

    }

    public function read(int $id): ?PatientDTO
    {
        $query = $this->connection->createQueryBuilder();

        $query = $query
            ->select('MEDREC_ID AS ID', 'CONCAT(FIRSTNAME, " ", LASTNAME) AS NAME')
            ->from('patient')
            ->where('MEDREC_ID = ?')
            ->setParameter(0, $id)
            ->execute()->fetch();

        return $query;
    }

    public function update(User $user): bool
    {

    }

    public function delete(int $id): bool
    {

    }

    public function getAll(): ?array
    {

        $query = $this->connection->createQueryBuilder();

        $query = $query
            ->select('MEDREC_ID AS ID', 'CONCAT(FIRSTNAME, " ", LASTNAME) AS NAME')
            ->from('patient')
            ->setMaxResults(40)
            ->execute()->fetchAll();

        return $query;
    }

    // Prescibed greater than n times
    public function prescribedGtN(int $n): ?array
    {
        $query = $this->connection->createQueryBuilder();

        $query = $query
            ->select('DISTINCT p.MEDREC_ID AS ID', 'CONCAT(FIRSTNAME, " ", LASTNAME) AS NAME')
            ->from('patient', 'p')
            ->join('p', 'medication', 'm', 'p.MEDREC_ID = m.MEDREC_ID')
            ->where('PRESCRIBED_COUNT > ?')
            ->setParameter(0, $n)
            ->setMaxResults(40)
            ->execute()->fetchAll();

        return $query;
    }
}