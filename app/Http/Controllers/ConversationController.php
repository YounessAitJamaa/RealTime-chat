<?php

namespace App\Http\Controllers;

use App\Events\MessageSent;
use App\Models\Conversation;
use App\Models\Message;
use Illuminate\Http\Request;

class ConversationController extends Controller
{
    public function index()
    {
        $conversations = Conversation::where('user1_id', auth()->id())
            ->orWhere('user2_id', auth()->id())
            ->get();

        return view('conversations.index', compact('conversations'));
    }

    public function show(Conversation $conversation) 
    {
        if (!in_array(auth()->id(), [$conversation->user1_id, $conversation->user2_id])) {
            abort(403);
        }

        $messages = $conversation->messages;
        
        return view('conversations.show', compact('conversation', 'messages'));
    }

    public function store(Request $request, Conversation $conversation)
    {
        $request->validate(['content' => 'required|string']);

        $message = Message::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $conversation->user1_id == auth()->id() ? $conversation->user2_id : $conversation->user1_id,
            'content' => $request->content,
            'conversation_id' => $conversation->id,
        ]);

        event(new MessageSent($message));

        return back();
    }
}
