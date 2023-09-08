<?php
namespace App\Repositories;

use App\Models\City;
use App\Interfaces\CityInterface;

class CityRepository implements CityInterface
{
    public function all()
    {
        return City::all();
    }

    public function find($id)
    {
        return City::find($id);
    }
}
