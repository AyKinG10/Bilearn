@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-4 mb-4">Ойлан-тап</h1>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card border-primary">
                    <div class="card-body text-center">
                        <h5 class="card-title">Бастау</h5>
                        <p class="card-text">Ойлау үшін ең бірінші сұрау</p>
                        <br>
                        <a href="{{ route('game.show', 1) }}" class="btn btn-success">Бастау</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
