<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar py-1 navbar-expand-md ">
            <div class="container">
                {{-- Nabar Brand --}}
                <a class="navbar-brand" href="\">BDoctors</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                    {{-- Navbar left --}}
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        @auth
                        <li class="nav-item">
                            <a href="{{route('home')}}" class="nav-link" role="button">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.messages.index')}}" class="nav-link" role="button">Messages</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('admin.reviews.index')}}" class="nav-link" role="button">Reviews</a>
                        </li>
                        @endauth
                    </ul>
                    {{-- Navbar right --}}
                    <ul class="navbar-nav mb-2 mb-lg-0">
                        <!-- Authentication Links -->
                        @guest
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                        @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                        @endif
                        @else
                        {{-- Dropdown --}}
                        <li class="nav-item dropdown">
                            {{-- User --}}
                            <a class="nav-link dropdown-toggle" href="#" id="navbarScrollingDropdown" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                @if(Auth::user()->infos != null)
                                <img src="{{ asset('storage/' . Auth::user()->infos->photo) ?? 'https://keytokids.com.au/wp-content/uploads/2017/09/placeholder-face-big.png' }}"
                                    class="rounded-circle mx-1"
                                    style="width:32px;">
                                @endif
                                <span>Dr.</span> <span>{{ Auth::user()->name }}</span> <span>{{ Auth::user()->surname
                                    }}</span>
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarScrollingDropdown">
                                <li>
                                    {{-- logout --}}
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
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