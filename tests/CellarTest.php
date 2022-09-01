<?php

namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;

class CellarTest extends ApiTestCase
{
    public function testGetCollection(): void
    {
        $response = static::createClient()->request('GET', '/api/cellars/2');
        $this->assertResponseIsSuccessful();
        
        // $response = $this->createClientWithCredentials()->request('GET', '/api/cellars/2');
        // $this->assertResponseIsSuccessful();
        // dd($response);
    }
}