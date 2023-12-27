@extends('layouts.app')

@section('content')

    @if($results->isEmpty())
        <p class="display-2" align="center">No results found.</p>
    @else
        <div class="section trending">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-heading">

                            <h2> Іздеу нәтижелері</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">

                    </div>
                    @foreach($results as $result)
                        <div class="col-lg-3 col-md-6">
                            <div class="item" style="height: 450px">
                                <div class="thumb">
                                    <a href="{{route('courses.show',$result->id)}}"><img src="{{asset($result->Wallpaper)}}" height="300" alt=""></a>
                                    <span class="price"><em>{{$result->Price+4500}}KZT</em>{{$result->Price}}KZT</span>
                                </div>
                                <div class="down-content">
                                    <h2>{{$result->Name}}</h2>
                                    <form action="{{route('course.like',$result->id)}}" method="post">
                                        @csrf
                                        <button class="btn btn-outline-danger" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                                <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                            </svg></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
@endsection
