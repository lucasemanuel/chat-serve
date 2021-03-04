<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreRequest;
use App\Models\User;

class UserController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $users = User::where('id', '<>', $user->id)->get();

        return response()->json($users);
    }

    public function store(StoreRequest $request)
    {
        $user = new User();
        $user->fill($request->all());
        $user->save();

        return response()->json([
            'message' => 'Usuário registrado com sucesso!'
        ]);
    }

    public function destroy()
    {
        $user = auth()->user();
        $user->delete();

        return response()->json('', 204);
    }
}
