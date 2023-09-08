<?php

namespace App\Repositories;

use App\Interfaces\ProvinceInterface;
use Illuminate\Support\Facades\Http;

class RajaOngkirProvinceRepository implements ProvinceInterface {
    protected $apiKey;
    protected $baseUri;

    public function __construct() {
        $this->apiKey = config('services.rajaongkir.key');
        $this->baseUri = config('services.rajaongkir.base_uri');
    }

    public function all() {
        $provinceResponse = Http::withHeaders([
            'key' => $this->apiKey
        ])->get($this->baseUri . 'province');

        if ($provinceResponse->successful()) {
            return $provinceResponse->json()['rajaongkir']['results'];
        }

        return [];
    }

    public function find($id) {
        $provinceResponse = Http::withHeaders([
            'key' => $this->apiKey
        ])->get($this->baseUri . 'province', ['id' => $id]);

        if ($provinceResponse->successful()) {
            $provinces = $provinceResponse->json()['rajaongkir']['results'];
            return $provinces;


        }

        return null;
    }
}
