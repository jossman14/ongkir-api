<?php

namespace App\Repositories;

use App\Interfaces\CityInterface;
use Illuminate\Support\Facades\Http;

class RajaOngkirCityRepository implements CityInterface {
    protected $apiKey;
    protected $baseUri;

    public function __construct() {
        $this->apiKey = config('services.rajaongkir.key');
        $this->baseUri = config('services.rajaongkir.base_uri');
    }

    public function all() {
        $cityResponse = Http::withHeaders([
            'key' => $this->apiKey
        ])->get($this->baseUri . 'city');

        if ($cityResponse->successful()) {
            return $cityResponse->json()['rajaongkir']['results'];
        }

        return [];
    }

    public function find($id) {
        $cityResponse = Http::withHeaders([
            'key' => $this->apiKey
        ])->get($this->baseUri . 'city', ['id' => $id]);

        if ($cityResponse->successful()) {
            $cities = $cityResponse->json()['rajaongkir']['results'];
            return $cities;


        }

        return null;
    }
}
