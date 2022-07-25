<?php

namespace App\Http\Controllers;

use App\Http\Requests\RegisterFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return User::paginate(10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RegisterFormRequest $request)
    {
        $user = User::create($request->all());

        if (!$user) {
            return response()->json([
                'error' => ['message' => ['Erro ao cadastrar usuário']],
            ], Response::HTTP_NOT_FOUND);
        }
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'error' => ['message' => ['Usuário não encontrado']],
            ], Response::HTTP_NOT_FOUND);
        }
        return User::find($id);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        if (!$user) {
            return response()->json([
                'error' => ['message' => ['Usuário não encontrado']],
            ], Response::HTTP_NOT_FOUND);
        }

        $user->update($request->all());

        return $user;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        
        if (!$user) {
            return response()->json([
                'error' => ['message' => ['Usuário não encontrado']],
            ], Response::HTTP_NOT_FOUND);
        }

        $user->delete();

        return response()->json(['message' => 'Usuário deletado com sucesso'], Response::HTTP_OK);
    }

    public function logout(){
        auth()->user()->tokens()->delete();
        return response()->json(['message' => ['Logout realizado com sucesso']], Response::HTTP_OK);
    }
}
