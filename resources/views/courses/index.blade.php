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
                            <form id="search" action="#">
                                <input type="text" placeholder="Type Something" id='searchText' name="searchKeyword" onkeypress="handle" />
                                <button role="button">Search Now</button>
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
                        <h2>Categories</h2>
                    </div>
                </div>
                @foreach($categories as $cat)
                <div class="col-lg col-sm-6 col-xs-12">
                    <div class="item">
                        <a href="{{route('course.category',$cat->id)}}"><h4>{{$cat->Name_kz}}</h4></a>
                        <div class="thumb">
                            <a href="{{route('course.category',$cat->id)}}"><img src="{{$cat->catImg}}" height="300 " width="200" alt="...."></a>
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

                        <h2>Courses</h2>
                    </div>
                </div>
                <div class="col-lg-6">

                </div>
                @foreach($courses as $course)
                    <div class="col-lg-3 col-md-6">
                        <div class="item">
                            <div class="thumb">
                                <a href="{{route('courses.show',$course->id)}}"><img src="{{asset($course->Wallpaper)}}" height="300" alt=""></a>
                                <span class="price"><em>{{$course->Price+4500}}KZT</em>{{$course->Price}}KZT</span>
                            </div>
                            <div class="down-content">
                                <h2>{{$course->Name}}</h2>
                                <a href="#Cart_function"><i class="fa fa-shopping-bag"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
{{--        --}}
{{--            <div class="container">--}}
{{--            <div class="row">--}}
{{--                @foreach($courses as $course)--}}
{{--                    <div class="col-sm-4">--}}
{{--                        <div class="card">--}}
{{--                            <div class="card-body text-center">--}}
{{--                                <img class="card-img-top" src="{{asset($course->Wallpaper)}}" width="100px" height="300px" alt="Card image cap">--}}
{{--                                <br><br>--}}
{{--                                <h2 class="card-title">{{$course->Name}}</h2>--}}
{{--                                <h5 class="card-title" align="center">Price:{{$course->Price}}$</h5>--}}
{{--                                <a href="{{route('courses.show',$course->id)}}" class="btn btn-primary">Read More</a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                @endforeach--}}
{{--            </div>--}}
{{--        </div>--}}
@endsection
