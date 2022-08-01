<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Exception;

class AuthController extends Controller
{
    public function login(Request $request)
    {

        $credentials = $request->only('email', 'password');

        if (!$token = auth('api')->attempt($credentials)) {
            throw new Exception('Não autorizado!', 401);
        }

        $ret = [
            'token' => $token,
            'token_type' => 'Bearer',
            'expires_in' => auth('api'),
            'user' => auth()->user()
        ];

        return response()->json($ret, 200);
    }

    public function logout()
    {

        auth('api')->logout();

        return response()->json(['status' => 'success'], 200);
    }
}
