@extends('layouts.adm')

@section('title', 'Roles Page ')

@section('content')
    <br>
    <br>
    <br>
    <h1>Role Page</h1>
    <h3><a class=" btn btn-outline-dark" href="{{route('adm.roles.create')}}">Create role</a></h3>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        @foreach($roles as $role)
            <tr>
                <th scope="row">{{$role->id}}</th>
                <td>{{$role->name}}</td>
                <td>
                    <form action="{{route('adm.roles.destroy', $role->id)}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-primary btn-lg">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
