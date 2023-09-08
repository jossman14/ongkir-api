<?php

namespace Tests\Feature;

use App\Interfaces\CityInterface;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CityControllerTest extends TestCase
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
        $response = $this->getJson('/api/search/cities');

        $response->assertStatus(200)
                 ->assertJson([
                     [
                         'city_id' => '1',
                         'province_id' => '21',
                         'province' => 'Nanggroe Aceh Darussalam (NAD)',
                         'type' => 'Kabupaten',
                         'city_name' => 'Aceh Barat',
                         'postal_code' => '23681'
                     ],
                     [
                         'city_id' => '2',
                         'province_id' => '21',
                         'province' => 'Nanggroe Aceh Darussalam (NAD)',
                         'type' => 'Kabupaten',
                         'city_name' => 'Aceh Barat Daya',
                         'postal_code' => '23764'
                     ],
                 ]);
    }

    public function testShowReturnsCityById()
    {
        $response = $this->getJson('/api/search/cities/2');

        $response->assertStatus(200)
                 ->assertJson([
                     'city_id' => '2',
                     'province_id' => '21',
                     'province' => 'Nanggroe Aceh Darussalam (NAD)',
                     'type' => 'Kabupaten',
                     'city_name' => 'Aceh Barat Daya',
                     'postal_code' => '23764'
                 ]);
    }

    public function testShowReturns404ForInvalidId()
    {
        $response = $this->getJson('/api/search/cities/600');

        $response->assertStatus(404)
                 ->assertJson(['message' => 'City not found']);
    }
}
