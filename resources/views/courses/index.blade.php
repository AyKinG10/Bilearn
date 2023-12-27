@extends('layouts.app')

@section('content')

    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="caption header-text">
                        <h6>Bilearn платформасына Қош келдіңіздер</h6>
                        <h2>BEST SITE EVER!</h2>
                        <p>Біздің платформадан сіздер көптерген курстарды арзан әрі тиімді түрде сатып ала аласыз</p>
                        <div class="search-input">
                            <form id="search" action="{{ route('searchByCourse') }}" method="get">
                                <input type="text" placeholder="Search..." id='searchText' name="query" onkeypress="handle" />
                                <button type="submit">Search Now</button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-2">
                    <div class="right-image">
                        <img src="https://softmg.ru/local/templates/smg.v.2/img/java.png" alt="">
                        <span class="price">Java</span>
                        <span class="offer">-40%</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/featured-01.png" alt="" style="max-width: 44px;">
                            </div>
                            <h4>Қазақ тілінде</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/featured-02.png" alt="" style="max-width: 44px;">
                            </div>
                            <h4>Әмбебаб</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/featured-03.png" alt="" style="max-width: 44px;">
                            </div>
                            <h4>Кері байланыс</h4>
                        </div>
                  </a>
         </div>
                <div class="col-lg-3 col-md-6">
                    <a href="#">
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/featured-04.png" alt="" style="max-width: 44px;">
                            </div>
                            <h4>Сапалы білім</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="section categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h2>Санатар:</h2>
                    </div>
                </div>
                @foreach($categories as $cat)
                    <div class="col-lg-4 col-md-6 col-sm-12 mb-4">
                        <div class="item">
                            <a href="{{ route('course.category', $cat->id) }}">
                                <h4>{{ $cat->Name_kz }}</h4>
                            </a>
                            <div class="thumb" style="height: 250px">
                                <a href="{{ route('course.category', $cat->id) }}">
                                    <img src="{{ $cat->catImg }}" class="img-fluid" alt="Category Image" >
                                </a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div class="section trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">

                        <h2>Курстар</h2>
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
                @foreach($courses as $course)
                    <div class="col-lg-3 col-md-6">
                        <div class="item" style="height: 250px">
                            <div class="thumb">
                                <a href="{{route('courses.show',$course->id)}}"><img src="{{asset($course->Wallpaper)}}"  alt=""></a>
                                <span class="price"><em>{{$course->Price+4500}}KZT</em>{{$course->Price}}KZT</span>
                            </div>
                            <div class="down-content">
                                <h4>{{$course->Name}}</h4>
                                @can('view',\App\Models\Course::class)
                                <form action="{{route('course.like',$course->id)}}" method="post">
                                    @csrf
                                    <button class="btn btn-outline-danger" type="submit"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-heart" viewBox="0 0 16 16">
                                            <path d="m8 2.748-.717-.737C5.6.281 2.514.878 1.4 3.053c-.523 1.023-.641 2.5.314 4.385.92 1.815 2.834 3.989 6.286 6.357 3.452-2.368 5.365-4.542 6.286-6.357.955-1.886.838-3.362.314-4.385C13.486.878 10.4.28 8.717 2.01L8 2.748zM8 15C-7.333 4.868 3.279-3.04 7.824 1.143c.06.055.119.112.176.171a3.12 3.12 0 0 1 .176-.17C12.72-3.042 23.333 4.867 8 15z"/>
                                        </svg></button>
                                </form>
                                @endcan
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

@endsection
