@extends('layouts.app')

@section('content')
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h2 class="text-center mb-4">Дәріс қосу</h2>

                        <form action="{{ route('lesson.store') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="mb-3">
                                <label for="nameInput" class="form-label">Дәрістің тақырыбы:</label>
                                <input type="text" name="title" class="form-control @error('name') is-invalid @enderror" placeholder="Enter Lesson Title">
                                @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="descInput" class="form-label">Сипаттамасы:</label>
                                <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Сипаттаманы енгізу">
                                @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="videoInput" class="form-label">Бейне:</label>
                                <input type="file" class="form-control-file @error('video') is-invalid @enderror" id="videosInput" name="video">
                                @error('video')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <input type="hidden" name="course_id" value="{{ $course }}">

                            <button class="btn btn-primary btn-block" type="submit">Сақтау</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
