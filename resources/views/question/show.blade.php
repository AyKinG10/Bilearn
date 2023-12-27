@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4">
                    <div class="open-book-container">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ $question->image }}" alt="Wallpaper" width="300"  height="400px">
                            </div>
                            <div class="col-md-6">
                                <div class="book-content">
                                    <header class="text-center">
                                        <h1 class="display-4">{{ $question->title }}</h1>
                                    </header>
                                    <article>
                                        <p class="text-justify">{{ $question->content }}</p>
                                    </article>
                                    <div class="mt-2">
                                        <a href="">{{ $question->user->name }}</a>
                                    </div>
                                </div>
                            </div>
                            @if(Auth::user() && (Auth::user()->id == $question->user_id))
                                <form action="{{ route('questions.destroy', $question->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <button class="btn btn-danger" type="submit">Жою</button>
                                </form>
                            @endif
                        </div>
                        <div class="mt-4">
                            <div class="container mt-5">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Сұрақа жауап беру</h5>
                                        <form class="form-group" action="{{route('answer.store')}}" method="post">
                                            @csrf
                                            <textarea class="form-control" rows="4" name="answer" placeholder="Жауабыңызды осы жерге енгізіңіз..."></textarea>
                                            <input type="hidden" value="{{$question->id}}" name="question_id">
                                            <button type="submit" class="btn btn-primary">Жіберу</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <ul class="list-group">
                            <li class="row">
                            @foreach($answers as $answer)
                                <li class="list-group-item">
                                    <p>{{$answer->answer}}</p>
                                    <p>{{$answer->user->name}}</p>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
