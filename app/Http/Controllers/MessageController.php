<?php

namespace App\Http\Controllers;

use App\Events\SendMessage;
use App\Http\Requests\Message\StoreRequest;
use App\Models\Message;
use App\Models\User;

class MessageController extends Controller
{
    public function index(User $user)
    {
        $source = auth()->user()->id;

        $send = Message::where('destination_id', $user->id)
            ->where('source_id', $source);

        $messages = Message::where('destination_id', $source)
            ->where('source_id', $user->id)
            ->union($send)
            ->orderBy('created_at')
            ->get();

        return response()->json($messages);
    }

    public function store(StoreRequest $request)
    {
        $user = auth()->user();

        $destination = User::findOrFail($request->destination_id);

        $message = new Message();
        $message->source_id = $user->id;
        $message->fill($request->all());
        $message->save();

        SendMessage::dispatch($destination, $message);

        return response()->json($message, 201);
    }
}
