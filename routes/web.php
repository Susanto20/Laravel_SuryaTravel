<?php

use App\Order;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $syarat = Order::all();
    return view('welcome', compact('syarat'));
    // return view('welcome');
});

Route::get('/order', function () {
    return view('order');
});

Route::get('/laporan', function() {
    return view('laporan');
});
