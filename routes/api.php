<?php

use App\Http\Controllers\ApiSyaratController;
use App\Http\Controllers\ApiUserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['throttle:60,1']], function () {
    Route::post('user', 'ApiUserContorller@store');
    Route::group(['middleware' => ['auth:api']], function () {
        Route::get('user', 'ApiUserController@index');
    });
});

// Route::resource('syarat', 'ApiSyaratController');

Route::get('syarat/show', [ApiSyaratController::class, 'index']);
Route::post('syarat/store', [ApiSyaratController::class, 'store']);
Route::post('login', 'ApiLoginController@login');
Route::post('user/register', [ApiUserController::class, 'store']);
