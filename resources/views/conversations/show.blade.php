@extends('layouts.app')

@section('content')
<div id="chat-messages">
    @foreach ($messages as $message)
        <div>
            <strong>{{ $message->sender->name }}:</strong>
            {{ $message->content }}
        </div>
    @endforeach
</div>


<form id="chat-form" action="{{ route('messages.store', $conversation) }}" method="POST">
    @csrf
    <input type="text" name="content" placeholder="Type a message">
    <button type="submit">Send</button>
</form>
@endsection