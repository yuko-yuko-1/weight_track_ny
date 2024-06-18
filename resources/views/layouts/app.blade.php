<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name') }} | @yield('title')</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @stack('css')

    {{-- FontAwesome --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    {{-- css--}}
    <link rel="stylesheet" href="{{ asset('css/style.css')}}">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm p-0">
            <div class="container">
                @guest
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <div class="navbar-brand d-flex align-items-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo">
                            <h1 class="h5 mb-0 ms-2">{{ config('app.name') }}</h1>
                        </div>
                    </a>
                @endguest
                @auth
                    <a class="navbar-brand" href="{{ url('/weight_and_meals/today') }}">
                        <div class="navbar-brand d-flex align-items-center">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo">
                            <h1 class="h5 mb-0 ms-2">{{ config('app.name') }}</h1>
                        </div>
                    </a>
                @endauth
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                    </ul>

                    <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ms-auto">
                    <!-- If Guest -->
                    @guest
                          @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('About us') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">{{ __('FAQ') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif
                    @else
                        <!-- If Authenticated -->
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('what-is-bmi')}}">{{ __('What\'s BMI') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('About us') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('FAQ') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle nav-user-info" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset('images/Profile/' . Auth::user()->avatar) }}" alt="{{ Auth::user()->username }}" class="nav-profile-image">
                                @else
                                   <i class="fas fa-user-circle" style="font-size: 30px; border-radius: 50%;"></i>
                                @endif
                                {{ Auth::user()->username }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                @can('admin')
                                    <a href="{{ route('admin.users') }}" class="dropdown-item">
                                        <i class="fa-solid fa-user-gear"></i> Admin
                                    </a>
                                    <hr class="dropdown-divider">
                                @endcan
                                <a class="dropdown-item" href="{{ route('profile-main', Auth::user()->id) }}" ><i class="fa-regular fa-address-card"></i> {{ __('Profile') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
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

        @if (request()->is('admin/*'))
            <div class="container-fluid py-4 admin_image">
                <div class="row justify-content-center">
                    <div class="col-2">
                        <div class="list-group">
                            <a href="{{ route('admin.users') }}" class="list-group-item {{ request()->is('admin/users') ? 'active' : '' }}">
                                <i class="fa-solid fa-users"></i> Users
                            </a>

                            <a href="{{ route('admin.communities') }}" class="list-group-item {{ request()->is('admin/communities') ? 'active' : '' }}">
                                <i class="fa-solid fa-newspaper"></i> Communities
                            </a>

                            <a href="{{ route('admin.posts') }}" class="list-group-item {{ request()->is('admin/posts') ? 'active' : '' }}">
                                <i class="fa-solid fa-tags"></i> Community Posts
                            </a>

                            {{-- <a href="{{ route('admin.suggestions') }}" class="list-group-item {{ request()->is('admin/suggestions') ? 'active' : '' }}">
                                <i class="fa-solid fa-tags"></i> Suggestions
                            </a> --}}
                        </div>
                    </div> 
                    <main class="col-7">
                        @yield('content')
                    </main>                
                </div>
            </div>
        @else
            {{-- Header after log-in --}}
            @if (request()->is('weight_and_meals/*') || request()->is('community/*') || request()->is('suggestion/*'))
                <header class="my-0">
                    <div class="container-fluid">
                        <div class="row text-center">
                            <div class="col-4 border py-3 border-bottom-0 rounded-top {{ request()->is('weight_and_meals/*') ? 'tab-action-color' : '' }}">
                                <a href="{{ route('meal.today')  }}" class=" h5 text-decoration-none text-dark">
                                    Weight & Meals
                                </a>
                            </div>
                            <div class="col-4 border py-3 border-bottom-0 rounded-top {{ request()->is('community/*') ? 'tab-action-color' : '' }}">
                                <a href="{{ route('community') }}" class=" h5 text-decoration-none text-dark">
                                    Community
                                </a>
                            </div>
                            <div class="col-4 border py-3 border-bottom-0 rounded-top {{ request()->is('suggestion/*') ? 'tab-action-color' : '' }}">
                                <a href="" class=" h5 text-decoration-none text-dark">
                                    Suggestion
                                </a>
                            </div>
                        </div>
                    </div>
                </header> 
            @endif
            <main>
                @yield('content')
            </main>
        @endif   
    
        @include('footer')

    </div>

</body>
</html>

