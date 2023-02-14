<?php
namespace App\DAO;
use App\DAO\PatientDao;

class PatientDaoImpl implements PatientDAO{
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function get_all_patient() {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select('MEDREC_ID', 'FIRSTNAME', 'LASTNAME')
            ->from('patient', 'p')
            // ->join('p', 'medication', 'm', 'p.MEDREC_ID = m.MEDREC_ID')
            // ->where('PRESCRIBED_COUNT >')
            // ->setParameter(0)
            ->setMaxResults(30);

        return $queryBuilder->execute()->fetchAll();
    }
}
