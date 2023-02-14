<?php declare(strict_types=1);
namespace Test\Patient;

use PHPUnit\Framework\TestCase;
use Test\InitTest;

final class PatientTest extends InitTest 
{
    
    public function testPatient(): void
    {
        $PatientDaoService = $this->container['PatientController'];
        $this->assertIsArray($PatientDaoService->patient_prescribed_count());
    }
}