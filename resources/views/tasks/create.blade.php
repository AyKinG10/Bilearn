@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Тапсырма жасаңыз:</h2>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('tasks.store', $course) }}">
                    @csrf

                    <div class="mb-3">
                        <label for="title" class="form-label">Тапсырма тақырыбы:</label>
                        <input type="text" name="title" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Тапсырманың сипаттамасы:</label>
                        <textarea name="description" class="form-control" rows="4" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Сақтау</button>
                </form>
            </div>
        </div>
    </div>
@endsection
