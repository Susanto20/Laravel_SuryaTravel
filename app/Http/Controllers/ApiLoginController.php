<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class ApiLoginController extends Controller
{
    public function login(Request $request)
    {
        if (Auth::attempt(
            [
                'email' => $request->email,
                'password' => $request->password,
            ]
        )) {
            $user = Auth::user();
            $token = $user->createToken('user')->accessToken;
            $data['user'] = $user;
            $data['token'] = $token;
            return response()->json([
                'success' => true,
                'data' => $data,
                'token' => $token,
                'message' => 'Login Berhasil'

            ], 200);
        } else {
            return response()->json([
                'succes' => false,
                'pesan' => 'Login Gagal'

            ], 401);
        }
    }
}
