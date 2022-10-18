<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
class ApiUserController extends Controller
{
    public function index(Request $request)
    {
        UserHit::simpan();
        $respon = 'Selamat Datang, ' . \Auth::user()->name;
        return
            [
                'success' => true,
                'data' => $respon,
                'pesan' => 'OK',
            ];
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|min:2|max:50',
                'email' => 'required|min:2|max:50|email',
                'password' => 'required|min:2|max:30',
            ]
        );
        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();
        // $user = new \App\User();
        // $user->name = $request->name;
        // $user->email = $request->email;
        // $user->password = bcrypt($request->password);
        // $user->save();
        return response()->json(
            [
                'success' => true,
                'data' => $user,
                'pesan' => 'Data Berhasil Disimpan'
            ],
            200
        );
    }
}
