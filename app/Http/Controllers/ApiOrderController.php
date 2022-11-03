<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiOrderController extends Controller
{
    public function index(Request $request)
    {
        if ($request->has('uid')) {
            $orders = Order::where('user_id', $request->uid)->get();

            return $orders;
        }
    }

    public function store(Request $request)
    {

        // $request->validate(
        //     [
        //         'file' => 'mimes:png,jpg,jpeg',
        //     ]
        // );
        $orders = new Order();
        $orders->user_id = $request->user_id;
        $orders->tujuan = $request->tujuan;
        $orders->tanggal_berangkat = $request->tanggal_berangkat;
        $orders->jam = $request->jam;
        $orders->jumlah_kursi = $request->jumlah_kursi;
        $orders->status = $request->status;
        $orders->total = $request->total;
        $orders->file = $request->file;
        // if ($request->hasFile('file')) {
        //     $file = $request->file('file');
        //     $filename = time() . '-' . $file->getClientOriginalName();
        //     $request->file->move(public_path('orders'), $filename);
        //     $orders->file = $filename;
        //     $orders->save();
        // } else {
        //     $orders->save();
        // }
        $orders->save();
        return response()->json([
            'success' => true,
            'status' => 200,
            'data' => $orders,
            'message' => 'Data Berhasil Disimpan'

        ], 200);
    }
}
