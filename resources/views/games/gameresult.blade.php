@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="align-content: center;align-items: center;text-align: center" >
    <h1 class="display-2">Нәтиже</h1>
    <p>Сіздің жауап: <em>{{ $userAnswer }}</em></p>
    <p>Дұрыс жауап: <strong>{{ $correctAnswer }}</strong></p>
    @if($userAnswer == $correctAnswer)
        <button class="btn btn-success">Дұрыс</button>
    @else
        <button class="btn btn-danger">Қателестіңіз</button> <br>   <br><br>
    @endif
        <a style="text-decoration: none" href="{{route('game.show',$id)}}">Келесі сұрақ</a>
    </div>
@endsection
