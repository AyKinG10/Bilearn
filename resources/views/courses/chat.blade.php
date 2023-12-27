@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 80px; margin-left: 200px;">
        <div class="container" id="chatContainer" style="overflow-y: auto; max-height: 400px;">
            <div class="col-8 mt-4">
                @foreach($messages as $message)
                    @if($message) @endif
                    @if($message->sender_id == $otherUser->id)
                        <div class="col-sm-6 p-4 mt-2" style="background-color: #ededef; border-radius: 15px;">
                            <p>{{ $message->message }}</p>
                        </div>
                    @else
                        <div class="col-sm-6 p-4 mt-2" style="background-color: #713aff; margin-left: 620px; border-radius: 15px">
                            <p style="color: white">{{ $message->message }}</p>
                            <small style="color:#ededef; float: right">{{ $message->created_at->diffForHumans() }}</small>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>

        <div class="container mt-5" style="margin-left: 200px;">
            <div class="col-sm-6 mt-4 text-center">
                <form id="message-form" action="{{ route('chat.store') }}" method="post" class="d-flex">
                    <input type="hidden" name="reciever_id" value="{{ $otherUser->id }}">
                    @csrf
                    @method('post')
                    <input type="text" name="message" class="form-control" placeholder="Хабарламаңызды енгізіңіз...">
                    <button type="submit" class="btn btn-primary ml-2">Жіберу</button>
                </form>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function () {
            // Send message using AJAX
            $('#message-form').submit(function (e) {
                e.preventDefault();
                $.ajax({
                    type: 'POST',
                    url: $(this).attr('action'),
                    data: $(this).serialize(),
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
                        $('#chatContainer').html(data);
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
