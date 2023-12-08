@extends('layouts.app')
@section('content')
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
    <script>
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
    </script>
@endsection
