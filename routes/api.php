<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProvinceController;
use App\Http\Controllers\CityController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AuthController;
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






Route::post('login', [LoginController::class, 'login'])->middleware('throttle.failed.logins')->name('login');;

Route::group(['middleware' => ['auth.jwt','api']], function() {

    Route::controller(LoginController::class)->group(function () {
        Route::post('register', 'register');
        Route::post('logout', 'logout');
        Route::post('refresh', 'refresh');
    });

    Route::controller(ProvinceController::class)->group(function () {
        Route::get('search/provinces', 'index');
        Route::get('search/provinces/{id}', 'show');
    });

    Route::controller(CityController::class)->group(function () {
        Route::get('search/cities', 'index');
        Route::get('search/cities/{id}', 'show');
    });

});
