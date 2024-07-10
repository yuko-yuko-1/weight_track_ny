<footer class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 d-flex justify-content-start align-items-center">
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
                    </div>
                    <div class="col-md-6">
                        <ul class="navbar-nav ms-auto d-flex flex-row mb-0 justify-content-end">
                            <li class="nav-item me-3">
                                <a class="nav-link" href="{{ route('about_us') }}">{{ __('About us') }}</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('faq') }}">{{ __('FAQ') }}</a>
                            </li>
                        </ul>
                        <div class="col-12"> 
                            <p class="text-end">&copy; 2024 Weightrack and may not be used by third parties without explicit permission.</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>