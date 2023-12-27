<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Bilearn') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('css/sss.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('https://unpkg.com/swiper@7/swiper-bundle.min.css') }}"/>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">


    <style>/* public/css/app.css */
        body{
            background-image: url("https://t4.ftcdn.net/jpg/01/23/73/15/360_F_123731572_KMfBEkpbRlfQj1ypdPVwv4W0r27B9hVJ.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-position: center;
        }
        .chat-container {
            max-width: 600px;
            margin: auto;
        }

        .message-link {
            text-decoration: none;
            color: #333;
        }

        .message {
            background-color: #f0f0f0;
            padding: 10px;
            margin-bottom: 10px;
            border-radius: 5px;
        }

        .sender-name {
            font-weight: bold;
        }

        .message-content {
            margin-top: 5px;
        }

        .sent-at {
            font-size: 12px;
            color: #777;
        }
    </style>
</head>
<body>
<div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
        <span class="dot"></span>
        <div class="dots">
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
</div>
<header class="header-area header-sticky" style="background-color: #1e9c4a">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <a href="{{ url('/') }}" class="logo" style="font-size: 40px; text-decoration: none; color: white">
                        {{ config('app.name', 'Bilearn') }}
                    </a>
                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <ul class="nav">
                        <li>
                            <a href="{{route('courses.index')}}">Барлық курстар</a>
                        </li>
                        @can('view',\App\Models\Course::class)
                            <li>
                                <a href="{{route('courses.purchased')}}">Менің Курстарым</a>
                            </li>
                        @endcan
                        @can('create',\App\Models\Course::class)
                        <li>
                            <a href="{{route('courses.create')}}">Курс қосу</a>
                        </li>
                        @endcan
                        @can('view',\App\Models\Course::class)
                        <li>
                            <a href="{{route('courses.favorite')}}">Таңдаулылар</a>
                        </li>
                        @endcan
                        <li class="nav-item dropdown">
                            <a class= href="#" id="navbarDropdownMore" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Қосымша
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-down" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1"/>
                                </svg>
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMore">
                                <a class="dropdown-item" style="color: black" href="{{ route('questions.index') }}">Сұрақ-жауап</a>
                                <a class="dropdown-item" style="color: black" href="{{ route('game') }}">Ойын</a>
                                <!-- Дополнительные подпункты, если необходимо -->
                            </div>
                        </li>
                        <li>
                            <a href="{{ route('chat.index') }}">Хабарлама</a>
                        </li>

                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}">{{ __('Кіру') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li >
                                    <a  href="{{ route('register') }}">{{ __('Тіркелу') }}</a>
                                </li>
                            @endif
                        @else
                            <li >
                                <a id="navbarDropdown"  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('index-profile') }}">Профиль</a>
                                    @can('viewAny',\App\Models\Course::class)
                                    <a href="{{ route('adm.users.index') }}">Admin Panel</a>
                                    @endcan
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Шығу') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>

                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
    <main class="py-4" style="background-color:#1e9c4a ">
        <br><br>
    </main>

    @yield('content')

<footer>
    <div class="container">
        <div class="col-lg-12">
            <p>Авторлық құқық © Bilearn компаниясы. &nbsp;&nbsp;</p>
        </div>
    </div>
</footer>
    <script src="{{asset('https://code.jquery.com/jquery-3.6.4.min.js')}}"></script>
    <script src="{{asset('vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/isotope.min.js')}}"></script>
    <script src="{{asset('js/owl-carousel.js')}}"></script>
    <script src="{{asset('js/counter.js')}}"></script>
    <script src="{{asset('js/custom.js')}}"></script>
</body>
</html>
