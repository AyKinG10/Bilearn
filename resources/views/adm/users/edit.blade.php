@extends('layouts.adm')
@section('content')
    <form action="{{route('adm.users.update', $user->id)}}" method="post">
        @csrf
        @method('PUT')<br>
        <div class="form-group">
            <label for="brand">Role:</label>
            <select name="role_id" id="">
                @foreach($roles as $role)
                    <option @if($role->id == $user->role_id) selected @endif value="{{$role->id}}">
                        {{$role->name}}
                    </option>
                @endforeach
            </select>
        </div>
        <br>
        <button type="submit" class="btn btn-secondary">Update info</button>
    </form>
@endsection
