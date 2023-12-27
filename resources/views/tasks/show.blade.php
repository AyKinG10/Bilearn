@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header">
                <h1>{{ $task->title }}</h1>
            </div>
            <div class="card-body">
                <p>{{ $task->description }}</p>
                <div class="mt-4">
                    <a href="{{ route('tasks.edit', ['course' => $course, 'task' => $task]) }}" class="btn btn-primary">Edit Task</a>
                    {{-- You can add more buttons or links as needed --}}
                </div>
            </div>
        </div>
    </div>
@endsection
