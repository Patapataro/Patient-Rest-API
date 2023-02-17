<?php declare(strict_types=1);

/**
 *  Builds the query and exicutes as needed.
 */

namespace App\DAO;
use App\DAO\PatientDao;
use App\DTO\PatientDTO;


class PatientDaoImpl implements PatientDAO{
    private $connection;

    public function __construct($connection) {
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

        $PatientDTO = $this::arrToDto($query);

        return $PatientDTO;
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

        $users = $this::mapPatientArray($query);

        // $users = array();
        // foreach ($query as $user) {
        //     $PatientDTO = new PatientDTO();
        //     $PatientDTO->ID = $user['ID'];
        //     $PatientDTO->name = $user['NAME'];
        //     $users[] = $PatientDTO;
        // }

        return $users;
    }

    // Prescibed greater than n times
    // public function prescribed_gt_n(int $n)
    // {

    //     $query = $this->connection->createQueryBuilder();

    //     $this->query = $this->query
    //         >select('DISTINCT p.MEDREC_ID AS ID', 'CONCAT(FIRSTNAME, " ", LASTNAME) AS Name')
    //         ->from('patient', 'p')
    //         ->join('p', 'medication', 'm', 'p.MEDREC_ID = m.MEDREC_ID')
    //         ->where('PRESCRIBED_COUNT > ?')
    //         ->setParameter(0, $n)
    //         ->setMaxResults(40)
    //         ->execute()->fetchAll();
    //     return $this;
    // }

    /**
     * Maps a query to the user Patent
     */
    private static function mapPatientArray($userArrays): array
    {

        $userDTOs = array_map(array('PatientDaoImpl', 'arrToDto'), $userArrays);
        return $userDTOs;
    }

    private static function arrToDto( $userArray): PatientDTO
    {
        $PatientDTO = new PatientDTO();
        $PatientDTO->ID = $userArray['ID'];
        $PatientDTO->name = $userArray['NAME'];
        return $PatientDTO;
    }

}
