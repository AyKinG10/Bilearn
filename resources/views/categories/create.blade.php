@extends('layouts.app')
@section('title','Categories Page')
@section('content')
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>CATEGORIES PAGE</h3>
    <form action="{{route('categories.store')}}" enctype="multipart/form-data" method="post">
        @csrf
        <div class="form-group">
            <label for="book">Name in KZ:</label>
            <input type="text" class="form-control" name="Name_kz">
        </div>
        <div class="form-group">
            <label for="book">Name in RU:</label>
            <input type="text" class="form-control" name="Name_ru">
        </div>
        <div class="form-group">
            <label for="book">Name in EN:</label>
            <input type="text" class="form-control" name="Name_en">
        </div>
        <div class="form-group">
            <label for="imgInput" class="form-control">Category Image</label>
            <input type="file" class="form-control @error('catImg') is-invalid @enderror"  id="imgInput" name="catImg">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
