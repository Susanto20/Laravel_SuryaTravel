<?php

use App\Http\Controllers\AdminController;
use App\Order;
use App\User;
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
    $users  = User::all();
    return view('welcome', compact('syarat', 'users'));
    // return view('welcome');
});
Route::post('proses-pesanan/{id}', [AdminController::class, 'proses'])->name('admin.proses');
Route::get('/order', function () {
    return view('order');
});

Route::get('/laporan', function () {
    return view('laporan');
});
