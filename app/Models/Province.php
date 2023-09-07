<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Province extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'province_id';
    protected $fillable = ['province'];

    // Definisikan relasi dengan cities (banyak kota dimiliki oleh satu provinsi)
    public function cities()
    {
        return $this->hasMany(City::class, 'province_id', 'province_id');
    }
}
