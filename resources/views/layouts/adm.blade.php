<!DOCTYPE html>
<!-- Coding By CodingNepal - codingnepalweb.com -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!----======== CSS ======== -->
    <link rel="stylesheet" href="{{asset('css/style.css')}}">
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <!----===== Iconscout CSS ===== -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

    <title>{{ config('app.name', 'Bilearn') }}</title>
</head>
<body>
<nav>
    <div class="logo-name">
        <a style="text-decoration: none" href="{{url('/')}}"><span class="logo_name">{{ config('app.name', 'Bilearn') }}</span></a>

    </div>

    <div class="menu-items">
        <ul class="nav-links">
            <li><a href="{{route('adm.users.index')}}">
                    <i class="uil uil-estate"></i>
                    <span class="link-name">Users</span>
                </a></li>
            <li><a href="{{route('adm.categories.index')}}">
                    <i class="uil uil-files-landscapes"></i>
                    <span class="link-name">Categories</span>
                </a></li>
            <li><a href="{{route('adm.roles.index')}}">
                    <i class="uil uil-chart"></i>
                    <span class="link-name">Roles</span>
                </a></li>
            <li><a href="{{route('adm.questions.index')}}">
                    <i class="uil uil-thumbs-up"></i>
                    <span class="link-name">Questions</span>
                </a></li>
            <li><a href="{{route('adm.comments.index')}}">
                    <i class="uil uil-comments"></i>
                    <span class="link-name">Comment</span>
                </a></li>
            <li><a href="{{route('adm.games.index')}}">
                    <i class="uil uil-share"></i>
                    <span class="link-name">Games</span>
                </a></li>
        </ul>

        <ul class="logout-mode">
            <li><a href="#">
                    <span class="link-name">{{ Auth::user()->name }}</span>
                </a></li>

            <li class="mode">
                <a href="#">
                    <i class="uil uil-moon"></i>
                    <span class="link-name">Dark Mode</span>
                </a>

                <div class="mode-toggle">
                    <span class="switch"></span>
                </div>
            </li>
        </ul>
    </div>
</nav>

<section class="dashboard">
    <div class="top">
        <i class="uil uil-bars sidebar-toggle"></i>
        <form action="{{route('adm.users.search')}}" class="search-box" method="GET">
                <i class="uil uil-search"></i>
                <input type="text" name="search" placeholder="Search here...">
        </form>
    </div>

   @yield('content')
</section>

<script src="{{asset('js/script.js')}}"></script>
</body>
</html>
