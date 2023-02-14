<?php
namespace App\Controllers;

class Patient {
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function patient_prescribed_count($count)
    {
        var_dump($count);
    }
}