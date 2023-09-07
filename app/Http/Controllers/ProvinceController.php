<?php

namespace App\Http\Controllers;

use App\Interfaces\ProvinceInterface;

use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    protected $province;

    public function __construct(ProvinceInterface $province)
    {
        $this->province = $province;
    }

    public function index()
    {
        $provinces = $this->province->all();
        return response()->json($provinces);
    }

    public function show($id)
    {
        $province = $this->province->find($id);

        if (!$province) {
            return response()->json(['message' => 'Province not found'], 404);
        }

        return response()->json($province);
    }
}
