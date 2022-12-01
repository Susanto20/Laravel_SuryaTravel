<?php

namespace App\Http\Controllers;

use App\Order;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function proses(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = $request->status;
        $allOrder = Order::where('tanggal_berangkat', $request->tanggal_berangkat)
            ->where('jam', $request->jam)
            ->where('status', 'Diterima')->get();
        $filterKursi = 0;
        foreach ($allOrder as $all) {
            $filterKursi += $all->jumlah_kursi;
        }
        $jumlah = $filterKursi + $request->jumlah_kursi;
        if ($jumlah > 6) {

            return back()->with('message', 'Tidak bisa diterima, kursi tidak tersedia');
        } else {

            $order->update();
            if ($request->status === 'Selesai') {
                return redirect()->route('pesanan.selesai');
            } else {

                return back();
            }
        }
    }
}
