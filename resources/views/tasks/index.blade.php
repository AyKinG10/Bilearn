@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h1>Тапсырма:</h1>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    @foreach($tasks as $task)
                        <a href="{{ route('tasks.show', [$course, $task]) }}" class="text-decoration-none">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <div>
                                    <h5>{{ $task->title }}</h5>
                                </div>
                                <div class="btn-group">
                                    <a href="{{ route('tasks.edit', [$course, $task]) }}" class="btn btn-outline-primary">өзгерту</a>

                                    <form action="{{ route('tasks.destroy', [$course, $task]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">жою</button>
                                    </form>
                                </div>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
