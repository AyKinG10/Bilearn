@extends('layouts.adm')

@section('title', 'Comments Page ')

@section('content')
    <h1>Comments Page</h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Content</th>
            <th scope="col">Edit</th>
        </tr>
        </thead>
        @foreach($comments as $comment)
            <tr>
                <th scope="row">{{$comment->id}}</th>
                <td>{{$comment->user->name}}</td>
                <td>{{$comment->content}}</td>
                <td>
                    <form action="{{route('adm.comments.destroy', $comment->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-lg">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
