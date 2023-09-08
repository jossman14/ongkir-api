<?php

namespace App\Http\Controllers;

use App\Interfaces\CityInterface;
use Illuminate\Http\Request;

class CityController extends Controller
{
    protected $city;

    public function __construct(CityInterface $city)
    {
        $this->city = $city;
    }

    public function index()
    {
        $citys = $this->city->all();
        return response()->json($citys);
    }

    public function show($id)
    {
        $city = $this->city->find($id);

        if (!$city) {
            return response()->json(['message' => 'City not found'], 404);
        }

        return response()->json($city);
    }
}
