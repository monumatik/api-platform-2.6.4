<?php

namespace App\Tests\Api;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\Category;

class CategoryTest extends ApiTestCase
{
    public function testCreateCategory()
    {
        $response = static::createClient()->request('POST', '/categories', ['json' => [
            'name' => 'Zbyszek',
        ]]);

        $this->assertResponseStatusCodeSame(201);
        $this->assertJsonContains([
            '@context' => '/contexts/Category',
            '@type' => 'Category',
            'name' => 'Zbyszek',
        ]);
    }
}
