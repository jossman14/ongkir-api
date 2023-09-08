<?php

namespace Tests\Feature;

use App\Interfaces\ProvinceInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProvinceControllerTest extends TestCase
{
    protected $token;

    public function setUp(): void
    {
        parent::setUp();


        $loginResponse = $this->postJson('/api/login', [
            'email' => 'hehe@hehe.com',
            'password' => 'hehe',
        ]);

        $loginResponse->assertStatus(200);

        $this->token = $loginResponse->json('access_token');

        $this->withHeaders(['Authorization' => 'Bearer ' . $this->token]);
    }

    public function testIndexReturnsAllCities()
    {
        $response = $this->getJson('/api/search/provinces');

        $response->assertStatus(200)
        ->assertJson([
            [
                'province_id' => '1',
                'province' => 'Bali',
            ],
            [
                'province_id' => '2',
                'province' => 'Bangka Belitung',
            ],
        ]);
    }

    public function testShowReturnsProvinceById()
    {
        $response = $this->getJson('/api/search/provinces/2');

        $response->assertStatus(200)
            ->assertJson([
                'province_id' => '2',
                'province' => 'Bangka Belitung',
            ]);
    }

    public function testShowReturns404ForInvalidId()
    {
        $response = $this->getJson('/api/search/provinces/600');

        $response->assertStatus(404)
                 ->assertJson(['message' => 'Province not found']);
    }
}
