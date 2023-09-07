<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;

Route::get('search/provinces', [ProvinceController::class, 'index']); // Mengambil semua provinsi
Route::get('search/provinces/{id}', [ProvinceController::class, 'show']);
Route::get('search/city', [CityController::class, 'index']); // Mengambil semua provinsi
Route::get('search/city/{id}', [CityController::class, 'show']);