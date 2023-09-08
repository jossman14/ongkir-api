<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Http;
use App\Models\Province;
use App\Models\City;

class FetchRajaOngkirData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fetch:rajaongkir_prov_city';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fetch Informasi Provinsi dan Kota dari RajaOngkir';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $apiKey = config('services.rajaongkir.key');
        $baseUri = config('services.rajaongkir.base_uri');
        
         $provinceResponse = Http::withHeaders([
            'key' => $apiKey
        ])->get($baseUri . 'province'); 

        if ($provinceResponse->successful()) {
            $provincesData = $provinceResponse->json()['rajaongkir']['results'];
            foreach ($provincesData as $data) {
                Province::updateOrCreate(['province_id' => $data['province_id']], [
                    'province' => $data['province']
                ]);
            }
            $this->info('Provinces data fetched successfully!');
        } else {
            $this->error('Failed fetching provinces data');
        }

        // Dapatkan data kota
        $cityResponse = Http::withHeaders([
            'key' => $apiKey 
        ])->get($baseUri . 'city'); 

        if ($cityResponse->successful()) {
            $citiesData = $cityResponse->json()['rajaongkir']['results'];
            foreach ($citiesData as $data) {
                City::updateOrCreate(['city_id' => $data['city_id']], [
                    'province_id' => $data['province_id'],
                    'province' => $data['province'],
                    'type' => $data['type'],
                    'city_name' => $data['city_name'],
                    'postal_code' => $data['postal_code']
                ]);
            }
            $this->info('Cities data fetched successfully!');
        } else {
            $this->error('Failed fetching cities data');
        }
    }
}
