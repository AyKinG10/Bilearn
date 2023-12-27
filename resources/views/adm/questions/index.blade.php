@extends('layouts.adm')
@section('title', 'Questions Page')
@section('content')
    <div class="container">
        <br><br><br>
        <h3>Question page</h3>
        <h3><a class=" btn btn-outline-dark" href="{{route('adm.questions.create')}}">Сұрақ қосу</a></h3>
        <table class="table">
            <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Content</th>
                <th scope="col">Image</th>
                <th scope="col">Delete</th>
            </tr>
            </thead>
            <tbody>
            @foreach($questions as $ques)
                <tr>
                    <th scope="row">{{$ques->id}}</th>
                    <td>{{$ques->title}}</td>
                    <td>{{$ques->content}}</td>
                    <td><img src="{{$ques->image}}" alt=".." height="50" width="70"></td>
                    <td>
                        <form action="{{route('adm.questions.destroy', $ques->id)}}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-lg">Жою</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
