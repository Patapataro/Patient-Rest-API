<?php declare(strict_types=1);
namespace Test;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;

use Pimple\Container;
use App\Config\ContainerConfig;



final class InitTest extends TestCase
{
    /** @test */
    public function testContainerIsLoaded()
    {
        $container = ContainerConfig::create_container();
        $this->assertTrue($container instanceof container);
        return $container;
    }

    #[Depends('testContainerIsLoaded')]
    public function testDatabaseIsConneted($container): void
    {
        $container['database_connection']->isConnected();
        $this->assertFalse($container['database_connection']->isConnected());
    }

}