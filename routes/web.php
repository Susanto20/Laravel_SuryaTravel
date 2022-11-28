<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ApiLoginController;
use App\Http\Controllers\OrderController;
use App\Order;
use App\User;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Request;

Route::get('/', function () {
    $syarat = Order::where('status',  'Terkirim')->get();
    $users  = User::all();
    return view('welcome', compact('syarat', 'users'));
    // return view('welcome');
})->name('admin.index');

Route::get('/table', function (Request $request) {
    $users  = User::all();
    $keyword = $request->has('keyword');

    if ($keyword) {
        $syarat = Order::where('jam', $request->keyword)->get();

        return view('order', compact('syarat', 'users'));
    } else {
        $syarat = Order::all();
        return view('table', compact('syarat', 'users'));
    }
    // return view('welcome');
})->name('admin.table');

Route::post('proses-pesanan/{id}', [AdminController::class, 'proses'])->name('admin.proses');
Route::post('login', [ApiLoginController::class, 'loginWeb'])->name('login.store');

Route::get('/pesanan-diterima', [OrderController::class, 'index'])->name('pesanan.diterima');

Route::get('/pesanan-selesai', function () {
    $syarat = Order::where('status', 'Selesai')->get();
    $users  = User::all();
    return view('order_selesai', compact('syarat', 'users'));
})->name('pesanan.selesai');

Route::get('/pesanan-ditolak', function () {
    $syarat = Order::where('status', 'Ditolak, kursi habis')->get();
    $users  = User::all();
    return view('order_ditolak', compact('syarat', 'users'));
})->name('pesanan.ditolak');

Route::get('/laporan', function () {
    return view('laporan');
});

Route::get('/sign_in', function () {
    return view('sign_in');
})->name('auth.login');

Route::post('login', [ApiLoginController::class, 'loginWeb'])->name('login.store');
Route::post('logout', [ApiLoginController::class, 'logoutWeb'])->name('logout.store');
Route::get('generate-pdf', 'PDFController@generatePDF');
