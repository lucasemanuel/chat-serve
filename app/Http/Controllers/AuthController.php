<?php

namespace App\Http\Controllers;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = request(['username', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['errors' => [
                'form' => ['Campo usuário ou senha incorrentos']
            ]], 422);
        }

        return $this->respondWithToken($token);
    }

    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Até mais!']);
    }

    protected function respondWithToken($token)
    {
        $user = auth()->user();

        return response()->json([
            'access_token' => $token,
            'user' => $user->toArray()
        ]);
    }
}
