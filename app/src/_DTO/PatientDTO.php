<?php declare(strict_types=1);
namespace App\DTO;

class PatientDTO {
    private $name;
    private $ID;
    private $NDC;

    // Name get and set
    public function get_name(): string
    {
        return $this->name;
    }

    public function set_name(string $name): void
    {
        $this->name = $name;
    }

    // ID get and set
    public function get_id(): int
    {
        return $this->ID;
    }

    public function set_id(int $ID): void
    {
        $this->ID = $ID;
    }

    // NDC get and set
    public function get_ndc(): string
    {
        return $this->NDC;
    }

    public function set_ndc(string $NDC): void
    {
        $this->NDC = $NDC;
    }
}