@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4">
                    <div class="open-book-container">
                        <div class="row">
                            <div class="col-md-5">
                                <!-- Изображение курса -->
                                <img src="{{ $courses->Wallpaper }}" alt="Wallpaper" width="300"  height="400px">
                            </div>
                            <div class="col-md-6">
                                <div class="book-content">
                                    <!-- Заголовок и цена -->
                                    <header class="text-center">
                                        <h1 class="display-4">{{ $courses->Name }}</h1>
                                        <p class="lead">Price: ${{ $courses->Price }}</p>
                                    </header>
                                    <!-- Описание курса -->
                                    <article>
                                        <p class="text-justify">{{ $courses->Description }}</p>
                                    </article><a href="{{ route('courses.edit', [$courses->id]) }}" class="btn btn-primary">Edit</a>
                                </div>
                            </div>
                            <form action="{{ route('courses.destroy', $courses->id) }}" method="post">
                                @method('delete')
                                @csrf
                                <button class="btn btn-danger" type="submit">Delete</button>
                            </form>
                        </div>
                        <hr class="my-4"> <!-- Добавлен разделитель -->
                        <div class="row mt-4">
                            <!-- Плейлист с видео (левая часть) -->
                            <div class="col-md-4">
                                <h3 class="playlist-header">Video Playlist</h3>
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Video Title</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- Пример элемента плейлиста -->
                                    <tr>
                                        <td>1</td>
                                        <td>Video 1</td>
                                        <td>
                                            <button type="button" class="btn btn-link">Play</button>
                                        </td>
                                    </tr>
                                    <!-- Добавьте здесь другие элементы плейлиста -->
                                    </tbody>
                                </table>
                            </div>
                            <!-- Видео-плеер (правая часть) -->
                            <div class="col-md-8">
                                <h3 class="player-header">Video Player</h3>
                                <video controls width="100%">
                                    <source src="{{ asset($courses->Videos) }}" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <hr class="my-4"> <!-- Добавлен разделитель -->
                        <!-- Секция комментариев -->
                        <div class="mt-4">
                            <h3 class="comments-header">Comments</h3>
                            <!-- Добавьте здесь код для отображения комментариев -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
