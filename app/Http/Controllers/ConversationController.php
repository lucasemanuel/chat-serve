<?php

namespace App\Http\Controllers;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = auth()
            ->user()
            ->messages()
            ->with('destination')
            ->groupBy('destination_id')
            ->get();

        return response()->json($conversations);
    }
}
