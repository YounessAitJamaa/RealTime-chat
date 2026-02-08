@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Your Conversations</h1>
    <ul>
        @foreach ($conversations as $conversation)
            <li>
                <a href="{{ route('conversations.show', $conversation) }}">
                    Conversation with {{ $conversation->user1->name }} and {{ $conversation->user2->name }}
                </a>
            </li>
        @endforeach
    </ul>
</div>
@endsection
