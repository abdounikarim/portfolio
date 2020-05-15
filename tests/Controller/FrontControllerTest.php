<?php

namespace App\Tests\Controller;

use Symfony\Component\Panther\PantherTestCase;

class FrontControllerTest extends PantherTestCase
{
    public function testFrontPage(): void
    {
        $client = static::createPantherClient();
        $client->request('GET', '/');

        $this->assertSelectorTextContains('h1', 'Abdouni Abdelkarim');
    }
}
