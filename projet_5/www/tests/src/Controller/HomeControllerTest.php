<?php

namespace App\Tests\src\Controller;



use Symfony\Bundle\FrameworkBundle\Tests\Functional\WebTestCase;

class ControllerTest extends WebTestCase
{
    public function testFirstPageConnexion()
    {
        $client = static::createClient();
        $client->request('GET', '/');

        static::assertSame(200,$client->getResponse()->getStatusCode());

        echo $client->getResponse()->getContent();
    }
}
