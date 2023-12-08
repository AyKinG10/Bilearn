@extends('layouts.app')

@section('content')
    <form action="{{route('courses.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">

                    <div class="form-group" style="margin-top: 10px;">

                        <input type="text" name="Name" class="form-control @error('Name') is-invalid @enderror" placeholder="Name">
                        @error('Name')
                        <div class="alert alert-danger ">{{ $message  }}</div>
                        @enderror <br>
                        <select class="form-control form-control-lg mt-3 @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                            @foreach($categories as $cat)
                                <option value="{{$cat->id}}">{{$cat->Name_kz}}</option>
                            @endforeach
                            @error('category_id')
                            <div class="alert alert-danger ">{{ $message }}</div>
                            @enderror
                        </select><br>
                        <input type="text" name="Description" class="form-control @error('Description') is-invalid @enderror" placeholder="Description">
                        @error('Description')
                        <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror
                        <br>
                        <input name="Price" class="form-control @error('Price') is-invalid @enderror" placeholder="Price">
                        @error('Price')
                        <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror
                        <br>
                        <label for="imgInput" class="form-control">Wallpaper Image</label>
                        <input type="file" class="form-control @error('img') is-invalid @enderror"  id="imgInput" name="Wallpaper">
                        @error('Wallpaper')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <label for="videoInput" class="form-control">Course Video</label>
                        <input type="file" class="form-control @error('Videos') is-invalid @enderror"  id="videosInput" name="Videos">
                        @error('Videos')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>
                        <label for="teacher">Автор</label>
                        <select name="teacher_id" class="form-control">
                            @foreach($teachers as $teacher)
                                <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <button class="btn btn-primary form-control"  style="margin-top: 20px"  type="submit">Save</button>
                </div>
            </div>
        </div>

    </form>
@endsection
