@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="col-12 mt-4">
            <div class="user-header">
                {{ $otherUser->name }}
            </div>

            @foreach($messages as $message)
                @if($message->sender_id == $otherUser->id)
                        <div class="col-sm-6 p-4 mt-2" style="background-color: pink; color: #fff; border-radius: 15px">
                            <p>{{ $message->message }}</p>
                    </div>
                @else

                        <div class="col-sm-6 p-4 mt-2" style="background-color: #DBDBDB; color: #fff; margin-left: 620px; border-radius: 15px">
                            <p>{{ $message->message }}</p>
                            <small style="color: white; float: right">{{ $message->created_at->diffForHumans() }}</small>
                        </div>
                @endif
            @endforeach

        </div>
    </div>
    <div class="container">
        <div class="col-sm-12 mt-4 text-center">
            <form id="message-form" action="{{ route('chat.store') }}" method="post">
                <input type="hidden" name="reciever_id" value="{{ $otherUser->id }}">
                @csrf
                @method('post')
                <input type="text" name="message" placeholder="Message">
                <button class="btn btn-primary" id="send-message-btn">Send</button>
            </form>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Send message using AJAX
            $('#send-message-btn').click(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $('#message-form').attr('action'),
                    data: $('#message-form').serialize(),
                    success: function (data) {
                        // Optionally, you can handle the success response
                        // For example, clear the input field or show a success message
                        $('#message-form input[name="message"]').val('');
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            });
            function loadMessages() {
                $.ajax({
                    type: 'GET',
                    url: "{{ route('load-messages', $otherUser->id) }}",
                    success: function (data) {
                        $('#chat-container').html(data);
                    },
                    error: function (error) {
                        console.log(error);
                    }
                });
            }
            loadMessages();
            setInterval(loadMessages, 5000);
        });

    </script>
@endsection
