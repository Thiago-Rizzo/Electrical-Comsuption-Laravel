<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request) {

        $credentials = $request->only('cpf', 'password');
        
    
        if (!$token = auth()->attempt($credentials)) {
            throw new Exception('Não autorizado!', 401);
        }

        return [
            'access' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth()->factory()->getTTL(),
            'user' => auth()->user()
        ];




        return response()->json(['status' => 'success'], 200);
    }

}
