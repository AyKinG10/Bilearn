@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <h1 class="mb-5 text-center">Сұрақтар</h1>
        <a class="btn btn-outline-primary mb-5" href="{{ route('questions.create') }}">Сұрақ қою</a>

        <div class="row">
            @foreach($q as $qu)
                <div class="col-md-4 mb-4">
                    <a href="{{route('questions.show',$qu->id)}}" class="text-decoration-none text-dark">
                        <div class="card h-100 border rounded shadow-sm">
                            @if($qu->image)
                                <img src="{{ asset($qu->image) }}" alt="Question Image" class="card-img-top">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $qu->title }}</h5>
                                <p class="card-text">{{ $qu->content }}</p>
                            </div>
                            <div class="card-footer bg-transparent border-top-0">
                                <small class="text-muted">{{ $qu->user->name }}</small>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>
@endsection
