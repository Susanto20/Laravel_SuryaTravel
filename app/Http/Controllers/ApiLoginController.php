<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ApiLoginController extends Controller
{
    public function logoutWeb()
    {
        // $user = Auth::user()->token();
        // $user->regenerateToken();
        // session()->invalidate();
        // session()->regenerateToken();
        // return redirect()->route('auth.login');

    }

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
    public function loginWeb(Request $request)
    {
        $userCheck = User::where('email', $request->email)->first();
        if ($userCheck->role === 'admin') {

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
                return redirect()->route('admin.index');
            } else {
                return back();
            }
        } else {
            return response()->json(['Hanya admin yang bisa sign in']);
        }
    }
}
