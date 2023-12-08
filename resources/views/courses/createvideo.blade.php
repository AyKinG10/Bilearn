@extends('layouts.app')

@section('content')
    <form action="{{route('lesson.store')}}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-5">

                    <div class="form-group" style="margin-top: 10px;">
                        <label for="nameInput" class="form-control">Lesson Title</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name')
                        <div class="alert alert-danger ">{{ $message  }}</div>
                        @enderror <br>
                        <label for="descInput" class="form-control">Description</label>
                        <input type="text" name="description" class="form-control @error('description') is-invalid @enderror" placeholder="Description">
                        @error('description')
                        <div class="alert alert-danger ">{{ $message }}</div>
                        @enderror
                        <br>
                        <label for="videoInput" class="form-control">Video</label>
                        <input type="file" class="form-control @error('video') is-invalid @enderror"  id="videosInput" name="video">
                        @error('video')
                        <div class="alert alert-danger">{{$message}}</div>
                        @enderror
                        <br>
                    </div>
                    <button class="btn btn-primary form-control"  style="margin-top: 20px"  type="submit">Save</button>
                </div>
            </div>
        </div>

    </form>
@endsection
