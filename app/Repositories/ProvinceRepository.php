<?php
namespace App\Repositories;

use App\Interfaces\ProvinceInterface;
use App\Models\Province;

class ProvinceRepository implements ProvinceInterface
{
    public function all()
    {
        return Province::all();
    }

    public function find($id)
    {
        return Province::find($id);
    }
}