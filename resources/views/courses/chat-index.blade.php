@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="chat-container">
            @foreach($messages->unique('sender_id') as $uniqueMessage)
                <a href="{{ route('chat', $uniqueMessage->sender->id) }}" class="message-link">
                    <div class="message">
                        <div class="sender-name">
                            <strong>From:</strong> {{ $uniqueMessage->sender->name }}
                        </div>
                        <div class="message-content">
                            <strong>Message:</strong> {{ $uniqueMessage->message }}
                        </div>
                        <div class="sent-at">
                            <strong>Sent at:</strong> {{ $uniqueMessage->created_at->format('Y-m-d H:i:s') }}
                        </div>
                    </div>
                </a>
                <hr>
            @endforeach
        </div>
    </div>
@endsection
