<nav class="navbar has-shadow">
    <div class="container">
        <div class="navbar-brand">
            <a href="{{ url('/') }}" class="navbar-item">{{ config('app.name') }}</a>

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

                        <a class="navbar-item" href="/threads?popular=1">Алдартай бичвэр</a>
                        <a class="navbar-item" href="/threads?unanswered=1">Хариултгүй бичвэр</a>
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
                            <a href="{{ route('profile', Auth::user()) }}" class="navbar-item">My Profile</a>
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