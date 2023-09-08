<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $primaryKey = 'city_id';
    protected $fillable = ['province_id', 'province', 'type', 'city_name', 'postal_code'];

    // Definisikan relasi dengan provinsi (satu kota dimiliki oleh satu provinsi)
    public function province()
    {
        return $this->belongsTo(Province::class, 'province_id', 'province_id');
    }
}
