@extends('layouts.adm')
@section('content')
    <br><br><br><br><br>
    <form method="POST" action="{{ route('adm.games.store') }}">
        @csrf
        <label for="question_text">Сұрақтар:</label>
        <input type="text" name="question" required>

        <label for="answer">Жауаптар:</label>
        <input type="text" name="answer" required>
        <button type="submit">Сақтау</button>
    </form>
@endsection
