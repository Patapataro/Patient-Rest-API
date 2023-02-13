<?php
namespace App\DAO;

class UserDAO {
    private $connection;

    public function __construct($connection) {
        $this->connection = $connection;
    }

    public function get_all_users() {
        $queryBuilder = $this->connection->createQueryBuilder();
        $queryBuilder
            ->select('MEDREC_ID', 'FIRSTNAME', 'LASTNAME')
            ->from('patient', 'p')
            // ->join('p', 'medication', 'm', 'p.MEDREC_ID = m.MEDREC_ID')
            // ->where('PRESCRIBED_COUNT >')
            // ->setParameter(0)
            ->setMaxResults(20);

        $userArray = $queryBuilder->execute()->fetchAll();

    }
}