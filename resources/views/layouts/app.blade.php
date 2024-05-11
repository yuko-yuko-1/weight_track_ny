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
                <a class="navbar-brand" href="{{ url('/') }}">
                    <div class="navbar-brand d-flex align-items-center">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo">
                        <h1 class="h5 mb-0 ms-2">{{ config('app.name') }}</h1>
                    </div>
                </a>
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
                            <a class="nav-link" href="#">{{ __('What\'s BMI') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('About us') }}</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">{{ __('FAQ') }}</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle nav-user-info" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                @if(Auth::user()->profile_photo_path)
                                    <img src="{{ Auth::user()->profile_photo_path }}" alt="{{ Auth::user()->name }}" class="nav-profile-image">
                                @else
                                   <i class="fas fa-user-circle" style="font-size: 30px; border-radius: 50%;"></i>
                                @endif
                                {{ Auth::user()->name }}
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#"><i class="fa-regular fa-address-card"></i> {{ __('Profile') }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="fa-solid fa-right-from-bracket"></i> {{ __('Logout') }}
                                </a>
                            </div>
                        </li>
                    @endguest
                </ul>
                </div>
            </div>
        </nav>

        
          {{-- <div class="container">
                <div class="row justify-content-center">
                    Admin Controls 下記はアドミン準備できたらコメントから戻す
                    @if (request()->is('admin/*'))
                        <div class="col-3">
                            <div class="list-group">
                                <a href="{{ route('admin.users') }}" class="list-group-item {{ request()->is('admin/users') ? 'active' : '' }}">
                                    <i class="fa-solid fa-users"></i> Users
                                </a>
                                <a href="{{ route('admin.community') }}" class="list-group-item {{ request()->is('admin/community') ? 'active' : '' }}">
                                    <i class="fa-solid fa-newspaper"></i> Community
                                </a>
                                <a href="{{ route('admin.posts') }}" class="list-group-item {{ request()->is('admin/posts') ? 'active' : '' }}">
                                    <i class="fa-solid fa-tags"></i> Community Posts
                                </a>
                                <a href="{{ route('admin.suggestions') }}" class="list-group-item {{ request()->is('admin/suggestions') ? 'active' : '' }}">
                                    <i class="fa-solid fa-tags"></i> Suggestions
                                </a>
                            </div>
                        </div>
                    @endif
              </div>
            </div> --}}

        <main>
            @yield('content')
        </main>
    </div>

    @include('footer')  
</body>
</html>

