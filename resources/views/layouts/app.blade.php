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

    <style>/* public/css/app.css */

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
                            <a href="{{route('courses.index')}}">All Courses</a>
                        </li>
                        @can('create',\App\Models\Course::class)
                        <li>
                            <a href="{{route('courses.create')}}">Create product</a>
                        </li>
                        @endcan
                        <li>
                            <a href="{{route('courses.favorite')}}">My favorites</a>
                        </li>
                        <li>
                            <a href="{{ route('question.index') }}">Questions</a>
                        </li>
                        <li>
                            <a href="{{ route('chat.index') }}">My chats</a>
                        </li>
                        <li >
                            <a id="navbarDropdown"  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                KZ
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a href="#" style="color: #1a1d20">KZ</a>
                                <a href="#" style="color: #1a1d20">RU</a>
                                <a href="#" style="color: #1a1d20">EN</a>
                            </div>
                        </li>
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li>
                                    <a href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li >
                                    <a  href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li >
                                <a id="navbarDropdown"  href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a href="{{ route('index-profile') }}">Profile</a>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
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
            <p>Copyright © Bilearn Company. &nbsp;&nbsp;</p>
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
