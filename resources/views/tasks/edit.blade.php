@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                <h2 class="mb-0">Тапсырманы жаңарту:</h2>
            </div>

            <div class="card-body">
                <form method="post" action="{{ route('tasks.update', [$course, $task]) }}">
                    @csrf
                    @method('put')

                    <div class="mb-3">
                        <label for="title" class="form-label">Тапсырма тақырыбы:</label>
                        <input type="text" name="title" class="form-control" value="{{ $task->title }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Тапсырма сипаттамасы:</label>
                        <textarea name="description" class="form-control" rows="4" required>{{ $task->description }}</textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Тапсыраманы жаңарту</button>
                </form>
            </div>
        </div>
    </div>
@endsection
