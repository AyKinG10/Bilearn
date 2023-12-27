@extends('layouts.adm')

@section('title', 'Games Page ')

@section('content')
    <h1>Games Page</h1>
    <h3><a class=" btn btn-outline-dark" href="{{route('adm.games.create')}}">Ойын сұрақтарын қосу</a></h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Question</th>
            <th scope="col">Answer</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        @foreach($questions as $question)
            <tr>
                <th scope="row">{{$question->id}}</th>
                <td>{{$question->question}}</td>
                <td>{{$question->answer}}</td>
                <td>
                    <form action="{{route('adm.games.destroy', $question->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-lg">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
