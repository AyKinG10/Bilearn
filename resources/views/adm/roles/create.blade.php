@extends('layouts.adm')
@section('title','Roles Page')
@section('content')
    <br>
    <br>
    <br>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <h3>Roles Page</h3>
    <form action="{{route('adm.roles.store')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="role">Name:</label>
            <input type="text" class="form-control" name="name">
        </div>
        <button type="submit" class="btn btn-success">Submit</button>
    </form>
@endsection
