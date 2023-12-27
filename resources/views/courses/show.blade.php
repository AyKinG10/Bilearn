@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card p-4 shadow-lg">
                    <div class="open-book-container">
                        <div class="row">
                            <div class="col-md-5">
                                <img src="{{ $courses->Wallpaper }}" alt="Wallpaper" class="img-fluid rounded" style="max-height: 400px;">
                            </div>
                            <div class="col-md-6">
                                <div class="book-content">
                                    <header class="text-center">
                                        <h1 class="display-4">{{ $courses->Name }}</h1>
                                        <p class="lead">Бағасы: ${{ $courses->Price }}</p>
                                    </header>
                                    <article class="mt-3">
                                        <p class="text-justify">{{ $courses->Description }}</p>
                                    </article>
                                    @if($isCreator || $isPaid)
                                                        <div class="mt-2">
                                                            <a href="{{ route('chat', $teacher) }}" class="btn btn-info">
                                                                Тәлімгер: {{ $teacher->name }}
                                                            </a>
                                                        </div>
                                        <div class="mt-3">
                                            @can('create',\App\Models\Course::class)
                                            <a href="{{ route('courses.edit', [$courses->id]) }}" class="btn btn-primary">Курсты өзгерту</a>
                                                            <a href="{{ route('lesson.create', [$courses->id]) }}" class="btn btn-primary">Дәрістер қосу</a>
                                                            <form action="{{ route('courses.destroy', $courses->id) }}" method="post" class="d-inline">
                                                                @method('delete')
                                                                @csrf
                                                                <button class="btn btn-danger" type="submit">Курсты жою</button>
                                                            </form>
                                            @endcan
                                                        </div>
                                                </div>
                                            </div>
                                        </div>

                                        <hr class="my-4">
                                        <div class="row mt-4">
                                            <div class="col-md-4">
                                                <h3 class="playlist-header">Бейнені ойнату тізімі</h3>
                                                <table class="table">
                                                    <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Бейне атауы</th>
                                                        <th>Әрекет</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($lessons as $index => $lesson)
                                                        <tr>
                                                            <td>{{ $index + 1 }}</td>
                                                            <td>{{ $lesson->title }}</td>
                                                            <td>
                                                                <a href="#" class="btn btn-link play-lesson" data-video="{{ asset($lesson->video) }}">Ойнату</a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-8">
                                                <h3 class="player-header">Бейне ойнатқыш</h3>
                                                <video id="videoPlayer" controls class="w-100">
                                                    <!-- Оставляем этот блок пустым для динамической подстановки источника видео -->
                                                    Сіздің браузеріңіз video тегін қолдамайды.

                                                </video>
                                                <!-- Progress Bar Container -->
                                                <div id="progressContainer">
                                                    <div id="progressBar"></div>
                                                </div>

                                                <!-- Кнопки перемотки -->
                                                <div class="mt-3 d-flex justify-content-center">
                                                    <button class="btn btn-outline-success" id="rewindButton">&lt;&lt; Артқа</button>
                                                    <button class="btn btn-outline-primary" id="forwardButton">Алдыға &gt;&gt;</button>
                                                </div>
                                                <div class="d-flex justify-content-end mt-3">
                                                    <a href="{{ route('tasks.create', ['course' => $courses->id]) }}" class="btn btn-link">Тапсырма қосу</a>
                                                    <a href="{{ route('courses.tasks', ['course' => $courses->id]) }}" class="btn btn-link">Тапсырмалар</a>
                                                </div>

                                            </div>
                                        </div>
                                        <hr class="my-4">
                                        <div class="mt-4">
                                            <div class="container mt-5">
                                                <div class="card">
                                                    <div class="card-body">
                                                        <h5 class="card-title">Пікір қалдыру</h5>
                                                        <form class="form-group" action="{{ route('comments.store') }}" method="post">
                                                            @csrf
                                                            <textarea class="form-control" rows="4" name="content" placeholder="Пікіріңізді осы жерге енгізіңіз..."></textarea>
                                                            <input type="hidden" value="{{ $courses->id }}" name="course_id">
                                                            <button type="submit" class="btn btn-primary mt-3">Сақтау</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        <ul class="list-group mt-4">
                            <h3 class="display-6" style="font-weight: bold">Пікірлер</h3> <br>
                            @foreach($comments as $comment)
                                <li class="list-group-item">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div>
                                            <p class="mb-1">{{ $comment->content }}</p>
                                            <small class="text-muted">{{ $comment->user->name }}</small>
                                        </div>
                                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-outline-danger btn-sm" type="submit">Жою</button>
                                        </form>
                                    </div>
                                </li>
                            @endforeach
                        </ul>

                    @else
                                        <div class="alert alert-warning mt-3" role="alert">
                                            Бейнені көру үшін курсты сатып алу керек.<a href="{{ route('courses.buy', $courses) }}" class="btn btn-primary btn-sm">Курсты сатып алыңыз</a>
                                        </div>
                                    @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var playButtons = document.querySelectorAll('.play-lesson');
            var videoPlayer = document.getElementById('videoPlayer');
            var loopButton = document.querySelector('.loop');
            var volumeRange = document.querySelector('.volume-range');
            var customPlayPauseButton = document.querySelector('.play-pause.custom-button');
            var progressBar = document.getElementById('progressBar');
            var progressContainer = document.getElementById('progressContainer');

            var currentTime = 0; // Сохраняем текущую позицию воспроизведения

            playButtons.forEach(function(button, index) {
                button.addEventListener('click', function(event) {
                    event.preventDefault();
                    var videoUrl = this.getAttribute('data-video');

                    // Сохраняем текущую позицию воспроизведения
                    currentTime = videoPlayer.currentTime;

                    // Update video source and play
                    videoPlayer.src = videoUrl;
                    videoPlayer.load();
                    videoPlayer.play();
                });
            });

            var rewindButton = document.getElementById('rewindButton');
            var forwardButton = document.getElementById('forwardButton');

            rewindButton.addEventListener('click', function () {
                videoPlayer.currentTime -= 1; // Перемотка назад на 3 секунды
            });

            forwardButton.addEventListener('click', function () {
                videoPlayer.currentTime += 1; // Перемотка вперед на 3 секунды
            });

            // Autoplay the first video
            if (playButtons.length > 0) {
                var firstVideoUrl = playButtons[0].getAttribute('data-video');
                videoPlayer.src = firstVideoUrl;
                videoPlayer.currentTime = currentTime; // Устанавливаем сохраненную позицию воспроизведения
                videoPlayer.load();
            }

            // Добавлен код для перемотки видео
            document.addEventListener('keydown', function(event) {
                // Use any key combination you prefer
                if (event.key === 'ArrowLeft') {
                    videoPlayer.currentTime -= 3; // Перемотка назад на 3 секунды
                } else if (event.key === 'ArrowRight') {
                    videoPlayer.currentTime += 3; // Перемотка вперед на 3 секунды
                }
            });

            // Progress Bar Update
            videoPlayer.addEventListener('timeupdate', function() {
                var value = (videoPlayer.currentTime / videoPlayer.duration) * 100;
                progressBar.style.width = value + '%';
            });

            // Click on progress bar to seek video
            progressContainer.addEventListener('click', function(e) {
                var percent = e.offsetX / this.offsetWidth;
                videoPlayer.currentTime = percent * videoPlayer.duration;
            });
        });
    </script>
@endsection
