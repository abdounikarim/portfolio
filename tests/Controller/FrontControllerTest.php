<?php

namespace App\Tests\Controller;

use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;
use Symfony\Component\HttpFoundation\Response;

class FrontControllerTest extends WebTestCase
{
    public function testFrontPage(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $this->assertResponseIsSuccessful();
        $this->assertSelectorTextContains('h1', 'Abdouni Abdelkarim');
    }

    public function testFrontPageWithFormSubmission(): void
    {
        $client = static::createClient();
        $client->request('GET', '/');

        $client->submitForm('Envoyer', [
            'contact[name]' => 'Karim',
            'contact[email]' => 'abdounikarim@gmail.com',
            'contact[message]' => 'A great message',
        ]);
        $this->assertResponseRedirects('/', Response::HTTP_FOUND);
    }
}
