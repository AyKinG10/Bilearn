@extends('layouts.app')

@section('content')
    <div class="container mt-5" style="align-content: center;align-items: center;text-align: center" >
        <h1> Ойлан-тап </h1>
        <ul>
           <a href="{{ route('game.show', 1) }}" class="btn btn-success mt-4">Бастау</a>

        </ul>
    </div>
@endsection
