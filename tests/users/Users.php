<?php declare(strict_types=1);
namespace Test\Users;

use Test\InitTest;

final class UserTest extends InitTest 
{
    public function testUusers(): void
    {
        $userDaoService = $this->container['UserDaoImpl'];
        $this->assertIsArray($userDaoService->get_all_users());
    }
}