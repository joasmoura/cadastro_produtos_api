<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function __invoke(Request $request)
    {
        if(!auth()->attempt($request->only('email', 'password'))){
            return response()->json(['errors' => ['message' => ['Email ou senha incorretos']]], Response::HTTP_NOT_FOUND);
        }

        $token = auth()->user()->createToken('user-token');
        return response()->json(['message' => ['Logado com sucesso'], 'authenticationToken' => $token->plainTextToken], Response::HTTP_OK);
    }
}
