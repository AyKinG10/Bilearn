@extends('layouts.app')

@section('content')
    <div class="container" style="margin-top: 20px">
        <div class="form-container" style="max-width: 500px;margin: 0 auto;margin-bottom:20px ">
    <h1>{{ $question->question }}</h1>

        <form method="post" action="{{ route('game.check', $question) }}">
            @csrf
            <div class="form-group">
            <label for="answer">Ваш ответ:</label>
            <input type="text" class="form-control" name="answer" id="answer">
            </div>
            <button type="submit" class="btn btn-outline-primary">Проверить ответ</button>
        </form>
        </div>
    </div>
        <!-- Здесь можно добавить дополнительную логику для обработки правильного и неправильного ответа -->
@endsection
