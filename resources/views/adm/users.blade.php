@extends('layouts.adm')
@section('content')
    <style>
        /* Внеси эти изменения в твой CSS-файл */
        .table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .table th,
        .table td {
            border: 1px solid #ddd;
            padding: 12px;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
        }

    </style>
    <div class="dash-content">
        <div class="activity">
            <div class="title">
                <i class="uil uil-clock-three"></i>
                <span class="text">Users</span>
            </div>

            <div class="activity-data">
                <table class="table">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Status</th>
                    </tr>
                    </thead>
                    <tbody>
                    @for($i=0;$i<count($users);$i++)
                        <tr>
                            <th scope="row">{{$i+1}}</th>
                            <td>{{$users[$i]->name}}</td>
                            <td>{{$users[$i]->email}}</td>
                            <td>{{$users[$i]->role->name}}</td>
                            <td>
                                <form action="
                    @if($users[$i]->is_active)
                        {{route('adm.users.ban',$users[$i]->id)}}
                    @else
                         {{route('adm.users.unban',$users[$i]->id)}}
                    @endif
                     " method="post">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn {{$users[$i]->is_active ? 'btn-success': 'btn-danger '}}" type="submit">
                                        @if($users[$i]->is_active)
                                            ban
                                        @else
                                            unban
                                        @endif
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @endfor
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
