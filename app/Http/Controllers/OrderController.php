<?php

namespace App\Http\Controllers;
use App\Order;
use App\User;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index(Request $request)
    {
        $keyword = $request->has('keyword');
        $users  = User::all();

        if ($keyword) {
            $syarat = Order::where('jam', 'LIKE', '%' .$request->keyword .'%')
            ->where('status', '!=','Terkirim')
            ->where('status', '!=','Ditolak, kursi habis')
            ->where('status', '!=','Selesai')->get();
            return view('order', compact('syarat', 'users'));
        }else{
            $syarat = Order::where('status', 'Diterima')->
            orWhere('status', 'Dalam proses')->get();
            
            return view('order', compact('syarat', 'users'));
        }
    }
}
