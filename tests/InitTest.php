<?php declare(strict_types=1);
namespace Test;
use PHPUnit\Framework\Attributes\Depends;
use PHPUnit\Framework\TestCase;

use Pimple\Container;
use App\Config\ContainerConfig;



final class InitTest extends TestCase
{
    private static $container;
    private static $db;

    public static function setUpBeforeClass(): void
    {
        self::$container = ContainerConfig::create_container();
        self::$db = self::$container['database_connection'];
    }

    public static function tearDownAfterClass(): void
    {
        self::$dbh = null;
    }


    public function testContainerIsLoaded(): void
    {
        $this->assertTrue(self::$container instanceof container);
    }

    public function testDatabaseIsConneted(): void
    {
        $this->assertFalse(self::$db->isConnected());
    }

}