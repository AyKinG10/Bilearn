@extends('layouts.app')

@section('content')
    <div class="container mt-5 text-center">
        <div class="card mx-auto" style="max-width: 500px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <div class="card-body">
                <h1 class="display-4 mb-4" style="color: #007bff;">Нәтиже</h1>
                <p class="lead">Сіздің жауап: <em>{{ $userAnswer }}</em></p>
                <p class="lead">Дұрыс жауап: <strong>{{ $correctAnswer }}</strong></p>

                @if($userAnswer == $correctAnswer)
                    <button class="btn btn-success mt-3">Дұрыс</button>
                @else
                    <button class="btn btn-danger mt-3">Қателестіңіз</button>
                    <br> <br> <!-- Adjust spacing -->
                @endif

                @if($id)
                    <a class="btn btn-primary mt-3" href="{{ route('game.show', ['question' => $id]) }}" style="text-decoration: none;">Келесі сұрақ</a>
                @else
                    <p class="text-muted mt-3">Ойын аяқталды</p>
                @endif
            </div>
        </div>
    </div>
@endsection
