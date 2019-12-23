<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'dfsafds') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <style>
        body { padding-bottom: 100px; }

        .level{ display: flex; align-items: center; }

        .flex { flex: 1; margin-bottom: 0;}

        .button{ float:right; }

    </style>
</head>
<body>
    <div id="app">
        <nav class="navbar has-shadow">
            <div class="container">
                <div class="navbar-brand">
                    <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name', 'Forum') }}</a>

                    <div class="navbar-burger burger" data-target="navMenu">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                </div>

                <div class="navbar-menu" id="navMenu">
                    <div class="navbar-start">
                        <div class="navbar-item has-dropdown is-hoverable">
                            <a class="navbar-link">Сонгох</a>
                            <div class="navbar-dropdown">
                                <a class="navbar-item" href="/threads">Бүх сэдэв</a>
                                @if (auth()->check())
                                    <a class="navbar-item" href="/threads?by={{auth()->user()->name }}">Миний сэдэв</a>
                                @endif

                                <a class="navbar-item" href="/threads?popular=1">Алдартай сэдэв</a>
                            </div>
                        </div>
                        
                        <a class="navbar-item" href="/threads/create">
                            Сэдэв үүсгэх
                        </a>
                        <div class="navbar-item has-dropdown is-hoverable">
                              <a class="navbar-link">Сувгууд</a>

                              <div class="navbar-dropdown">
                                  @foreach ($channels as $channel)
                                    <a class="navbar-item" href="/threads/{{ $channel->slug}}">{{$channel->name}}</a>
                                  @endforeach
                               
                               </div>
                        </div>
                    </div>                   
                    
                    <div class="navbar-end">
                        @if (Auth::guest())
                            <a class="navbar-item " href="{{ route('login') }}">Login</a>
                            <a class="navbar-item " href="{{ route('register') }}">Register</a>
                        @else
                            <div class="navbar-item has-dropdown is-hoverable">
                                <a class="navbar-link" href="#">{{ Auth::user()->name }}</a>

                                <div class="navbar-dropdown">
                                    <a class="navbar-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </nav>

        @yield('content')

    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
