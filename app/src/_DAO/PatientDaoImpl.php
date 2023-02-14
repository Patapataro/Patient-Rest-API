<?php declare(strict_types=1);
namespace App\DAO;
use App\DAO\PatientDao;

class PatientDaoImpl implements PatientDAO{
    private $connection;
    private $query;

    public function __construct($connection) {
        $this->connection = $connection;
        $this->query = $this->connection->createQueryBuilder();
    }

    public function get_all_patients() {
        $this->query = $this->query
            ->select('p.MEDREC_ID', 'FIRSTNAME', 'LASTNAME')
            ->from('patient', 'p');
                            
        return $this;
    }

    // Prescibed greater than n times
    public function prescribed_gt_n(int $n)
    {
        $this->query = $this->query
            ->join('p', 'medication', 'm', 'p.MEDREC_ID = m.MEDREC_ID')
            ->where('PRESCRIBED_COUNT > ?')
            ->setParameter(0, $n)
            ->setMaxResults(30);
        return $this;
    }

    public function execute_query() {
        return $this->query->execute()->fetchAll();
    }
}
