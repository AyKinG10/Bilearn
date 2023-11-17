@extends('layouts.app')
@section('title', 'Categories Page')
@section('content')
    <h3>Categories page</h3>
    <h3><a class=" btn btn-outline-dark" href="{{route('categories.create')}}">Create category</a></h3>
    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name_kz</th>
            <th scope="col">Name_ru</th>
            <th scope="col">Name_en</th>
            <th scope="col">Wallpaper</th>
        </tr>
        </thead>
        <tbody>
        @foreach($categories as $cat)
            <tr>
                <th scope="row">{{$cat->id}}</th>
                <td>{{$cat->Name_kz}}</td>
                <td>{{$cat->Name_ru}}</td>
                <td>{{$cat->Name_en}}</td>
                <td>{{isset($cat->catImg)}}</td>
                <td>
                    <form action="{{route('categories.destroy', $cat->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-lg">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
