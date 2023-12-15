<!-- resources/views/chat.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-5 text-center">Сұрақтар</h1>
        <a class="btn btn-outline-primary mb-5" href="{{ route('question.create') }}">Сұрақ қою</a>

        <div class="row">
            @foreach($q as $qu)
                <div class="col-md-4 mb-4">
                    <a href="{{route('question.show',$qu->id)}}">
                    <div class="card h-100">
                        @if($qu->image)
                            <img src="{{ asset($qu->image) }}" alt="Question Image" class="card-img-top">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $qu->title }}</h5>
                            <p class="card-text">{{ $qu->content }}</p>
                        </div>
                        <div class="card-footer">
                            <small class="text-muted">{{ $qu->user->name }}</small>
                        </div>
                    </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
