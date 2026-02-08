<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function store(Request $request, Conversation $conversation)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $conversation->user1_id == auth()->id() ? $conversation->user2_id : $conversation->user1_id,
            'content' => $request->content,
            'conversation_id' => $conversation->id,
        ]);

        \Log::info("Broadcasting message:", ['message' => $message]);  // Log message

        event(new MessageSent($message));

        return back();
    }

}
