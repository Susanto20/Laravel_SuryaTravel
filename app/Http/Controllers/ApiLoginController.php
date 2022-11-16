<?php

namespace App\Http\Controllers;

use Auth;
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
        
        { 
            if(Auth::user()->token){ 
             
            Auth::user()->tokens->each(function($token,$key){ 
            $token->delete(); 
            }); 
            return response()->json([ 
            'status'=>200, 
            'message'=>'Logout successfully', 
            ]); 
            }else{ 
            return response()->json([ 
            'status'=>419, 
            'message'=>'Logout successfully', 
            ]); 
            } 
            } 
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
    }
}
