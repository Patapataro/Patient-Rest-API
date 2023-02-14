<?php declare(strict_types=1);
namespace Test;
use PHPUnit\Framework\TestCase;

use Pimple\Container;
use App\Config\ContainerConfig;



final class InitTest extends TestCase
{
    /** @test */
    public function containerIsLoaded(): void
    {
        $container = ContainerConfig::create_container();
        $this->assertSame($container instanceof container, true);

    }

    // public function testTest() 
    // {
    //     $this->assertSame(0,0);
    // }
}