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
        $order->update();
        return back();
    }
}
