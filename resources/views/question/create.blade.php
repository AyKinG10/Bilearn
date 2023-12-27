<!-- resources/views/chat.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="container m-5">
        <div class="row justify-content-center">

            <div class="col-md-10">
                <a  href="{{ route('questions.index') }}" class="btn btn-outline-primary mb-5">Сұрақтарға өту</a>
                <form action="{{route('questions.store')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group mb-3">
                        <label for="titleInput">Тақырыбы:</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="titleInput" name="title" placeholder="Тақырыбы...">
                        @error('title')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="contentInput">Сипаттама:</label>
                        <textarea class="form-control @error('content') is-invalid @enderror" id="contentInput" rows="3" name="content" placeholder="Сипаттама"></textarea>
                        @error('content')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="imgInput" class="frpm-label">Сурет:</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" id="imgInput" name="image">
                        @error('image')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                    </div>

                    <div class="form-group mt-3">
                        <button class="btn btn-primary"  type="submit">Сақтау</button>
                    </div>

                </form>
            </div>
        </div>
            </div>
@endsection
