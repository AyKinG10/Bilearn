@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card shadow p-4">
                    <h2 class="text-center mb-4">Жаңа курсты Қосу</h2>

                    <form  action="{{ route('courses.store') }}" method="post" enctype="multipart/form-data">

                        @csrf
                        <div  class="form-group">
                            <input type="text" name="Name" class="form-control @error('Name') is-invalid @enderror" placeholder="Курстың аты">
                            @error('Name')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div style="margin-top: 10px" class="form-group">
                            <select class="form-control @error('category_id') is-invalid @enderror" name="category_id">
                                <option value="" selected disabled>Санатты таңдаңыз:</option>
                                @foreach($categories as $cat)
                                    <option value="{{ $cat->id }}">{{ $cat->Name_kz }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div style="margin-top: 10px" class="form-group">
                            <textarea name="Description" class="form-control @error('Description') is-invalid @enderror" placeholder="Курстың сипаттамасы"></textarea>
                            @error('Description')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div style="margin-top: 10px" class="form-group">
                            <input name="Price" class="form-control @error('Price') is-invalid @enderror" placeholder="Бағасы">
                            @error('Price')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div style="margin-top: 10px" class="form-group">
                            <label for="imgInput">Тұсқағаздағы сурет</label>
                            <input type="file" class="form-control-file @error('Wallpaper') is-invalid @enderror" id="imgInput" name="Wallpaper">
                            @error('Wallpaper')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div style="margin-top: 10px" class="form-group">
                            <select hidden="teacher_id" name="teacher_id" class="form-control">
                                @foreach($teachers as $teacher)
                                    <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button style="margin-top: 10px" class="btn btn-primary btn-block" type="submit">Сақтау</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
