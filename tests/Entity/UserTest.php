<?php

namespace App\Tests\Entity;

use App\Entity\User;
use PHPUnit\Framework\TestCase;

class UserTest extends TestCase
{
    public function testIdIsNull()
    {
        $user = new User();
        $this->assertNull($user->getId());
    }
}
