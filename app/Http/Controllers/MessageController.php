<?php

namespace App\Http\Controllers;

use App\Http\Requests\Message\StoreRequest;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    public function index(User $user)
    {
        $messages = auth()
            ->user()
            ->messages()
            ->where('destination_id', $user->id)
            ->get();

        return response()->json($messages);
    }

    public function store(StoreRequest $request)
    {
        $user = auth()->user();

        $message = new Message();
        $message->source_id = $user->id;
        $message->fill($request->all());
        $message->save();

        return response()->json($message, 201);
    }
}
