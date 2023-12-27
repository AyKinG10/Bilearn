@extends('layouts.app')

@section('title', 'Favorite Page')

@section('content')
    <div class="section trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">

                        <h2>Таңдаулы курстар</h2>
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
                @foreach($courses as $course)
                    <div class="col-lg-3 col-md-6 " style="width: 350px">
                        <div class="item">
                            <div class="thumb" >
                                <a href="{{route('courses.show',$course->id)}}"><img src="{{asset($course->Wallpaper)}}" height="300" alt=""></a>
                                <span class="price"><em>{{$course->Price+4500}}KZT</em>{{$course->Price}}KZT</span>
                            </div>
                            <div class="down-content">
                                <h2>{{$course->Name}}</h2>
                                    <form action="{{route('course.like',$course->id)}}" method="post" >
                                        @csrf
                                        <button class="btn btn-danger"  type="submit">Жою</button>
                                    </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
