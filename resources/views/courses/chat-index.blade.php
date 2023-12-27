@extends('layouts.app')

@section('content')
    <div class="container m-5">
        <div class="chat-list">
            @foreach($messages->unique('sender_id') as $uniqueMessage)
                <a href="{{ route('chat', $uniqueMessage->sender->id) }}" class="chat-item">
                    <div class="user-avatar">
                        <img src="{{ asset('storage/' . $uniqueMessage->sender->profImg) }}" alt="User Avatar" class="rounded-circle" style="width: 60px; height: 60px;">
                    </div>
                    <div class="chat-content">
                        <div class="sender-info">
                            <strong>{{ $uniqueMessage->sender->name }}</strong>
                            <span class="sent-at">{{ $uniqueMessage->created_at->format('Y-m-d H:i:s') }}</span>
                        </div>
                        <div class="last-message">
                            {{ $uniqueMessage->message }}
                        </div>
                    </div>
                </a>
                <hr class="my-2">
            @endforeach
        </div>
    </div>

    <style>
        .chat-list {
            max-width: 600px;
            margin: auto;
        }

        .chat-item {
            display: flex;
            align-items: center;
            text-decoration: none;
            color: #000;
            padding: 15px;
        }

        .user-avatar {
            margin-right: 15px;
        }

        .user-avatar img {
            border-radius: 50%;
        }

        .chat-content {
            flex: 1;
        }

        .sender-info {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }

        .sender-info strong {
            font-size: 18px;
            font-weight: bold;
        }

        .sent-at {
            font-size: 14px;
            color: #888;
        }

        .last-message {
            font-size: 16px;
            color: #888;
        }

        hr {
            margin: 5px 0;
            border-top: 1px solid #ddd;
        }
    </style>
@endsection
