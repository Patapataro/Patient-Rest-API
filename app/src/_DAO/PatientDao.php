<?php
namespace App\DAO;

interface PatientDao {
    public function get_all_patients();
    public function prescribed_gt_n(int $n);
}