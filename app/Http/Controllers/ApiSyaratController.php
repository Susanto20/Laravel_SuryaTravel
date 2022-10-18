<?php

namespace App\Http\Controllers;

use App\Syarat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApiSyaratController extends Controller
{
    public function index()
    {
        $syarat = Syarat::all();
        return $syarat;
    }

    public function store(Request $request)
    {

        $request->validate(
            [
                'file' => 'required|mimes:png,jpg,jpeg',
            ]
        );
        $file = $request->file('file');
        $filename = time() . '-' . $file->getClientOriginalName();
        $request->file->move(public_path('syarat'), $filename);
        $syarat = new Syarat();
        $syarat->tujuan = $request->tujuan;
        $syarat->tanggal_berangkat = $request->tanggal_berangkat;
        $syarat->jam = $request->jam;
        $syarat->kursi = $request->kursi;
        $syarat->file = $filename;
        $syarat->user_id = $request;
        $syarat->status = 0;

        $syarat->save();
        return response()->json($syarat, 201);
    }
}
