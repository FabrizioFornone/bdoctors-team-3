<nav class="navbar navbar-expand-lg navbar-dark navbar-back fixed-top py-1">
    <div class="container">
        {{-- Nabar Brand --}}
        <a class="navbar-brand" href="/">BDoctors</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            {{-- Navbar left --}}
            <ul class="navbar-nav me-auto">
                @auth
                <li class="nav-item">
                    <a href="{{route('home')}}" class="nav-link" role="button">Dashboard</a>
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
            <ul class="navbar-nav">
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
                    <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarScrollingDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        @if(Auth::user()->infos != null)
                        <div class="profile-pic-box mx-1">
                            <img src="{{ asset('storage/' . Auth::user()->infos->photo) ?? 'https://keytokids.com.au/wp-content/uploads/2017/09/placeholder-face-big.png' }}"
                                class="profile-pic-nav">
                        </div>
                        @endif
                        <span class="me-1">Dr.</span> <span class="me-1">{{ Auth::user()->name }}</span> <span class="me-1">{{ Auth::user()->surname }}</span>
                    </a>
                    <ul class="dropdown-menu ms_dropdown" aria-labelledby="navbarScrollingDropdown">
                        <li>
                            <a class="dropdown-item ms_dropdown-item" href="{{ route('admin.infos.index') }}">Profile</a>
                        </li>
                        <li>
                            {{-- logout --}}
                            <a class="dropdown-item ms_dropdown-item ms_logout" href="{{ route('logout') }}" onclick="event.preventDefault();
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