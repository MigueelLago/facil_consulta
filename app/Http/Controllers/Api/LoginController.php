<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
    public function login(Request $request){

        $credentials = $request->only(['email', 'password']);

        if(!$token = auth()->attempt($credentials)){
            
            return response()->json([
                'msg' => 'E-mail ou senha inválida',
                'status' => 401
            ], 401);
        }
    
        return response()->json([
            'data' => [
                'token' => $token,
                'token_type' => 'bearer',
                'expires_in' => auth()->factory()->getTTL() * 60
            ]
        ]);
    }
}
