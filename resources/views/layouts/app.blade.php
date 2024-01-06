<!doctype html>
<link lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>ITMS Project Management</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
<script src="https://kit.fontawesome.com/3227563827.js" crossorigin="anonymous"></script>

<!-- CSS -->
<link rel="stylesheet" href="{{ asset('app.css') }}">
<style>
    body {
        margin: 0;
        padding: 0;
        background-image: url('{{ asset('images/bg.jpg') }}');
        background-size: cover;
        background-position: center;
        color: #ffffff;
    }

    .content {
        padding: 200px;
        text-align: center;
        font-family: "Comic Sans MS";
    }
    .card-header {
        background-color: lightblue;
    }
</style>
</head>
<body>
<div id="app">
    <div id="mainNavigation">
        <nav role="navigation">
            <div class="py-3 text-center border-bottom">
                <img <img src="{{ asset('images/UNITEN.png') }}" alt="UNITEN Logo" height="65" style="text-align: center">
            </div>
        </nav>
        <div class="navbar-expand-md">
            <div class="navbar-dark text-center my-2">
                <button class="navbar-toggler w-75" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span> <span class="align-middle">Menu</span>
                </button>
            </div>
            <div class="text-center mt-3 collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav mx-auto " >
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page"  href="home">ITMS Project Management</a>
                    </li>
                    @can ('isManager')
                    <li class="nav-item">
                        <a class="nav-link"   href="{{route('manager.index')}}">Manager</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('leadDev.index')}}">Lead Developer</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('developer.index')}}">Developer</a>
                    </li>
                    @endcan
                    <li class="nav-item">
                        <a class="nav-link"   href="{{route('project.index')}}">Projects</a>
                    </li>
                </ul>
                <!-- Right Side Of Navbar -->
                <ul>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
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
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
</div>
</body>
</html>
