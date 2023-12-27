@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card mx-auto" style="max-width: 500px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body">
                <h1 class="card-title text-center mb-4" style="font-size: 1.5rem;">{{ $question->question }}</h1>

                <form method="post" action="{{ route('game.check', $question) }}">
                    @csrf
                    <div class="mb-3">
                        <label for="answer" class="form-label" style="font-weight: bold;">Сіздіңіз жауабыңыз:</label>
                        <input type="text" class="form-control" name="answer" id="answer" style="border: 1px solid #ced4da;">
                    </div>

                    <button type="submit" class="btn btn-primary btn-block">Жауапты тексеру</button>
                </form>
            </div>
        </div>
    </div>
@endsection
