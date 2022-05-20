<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm" >
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Laravel') }}
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            

            
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @guest
                <!-- Right Side Of Navbar -->
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
                <!-- Left Side Of Navbar -->
                <ul class=" navbar-nav me-5">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('home') }}">{{ __('Home') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('recipes') }}">{{ __('Recipes') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('ingredients') }}">{{ __('Ingredients') }}</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('about') }}">{{ __('About us') }}</a>
                    </li>
                </ul>
    
                <div class="searchBar me-5">
                    <div class="input-group">
                        <div class="form-outline">
                          <input id="search-input" type="search" id="form1" placeholder="Search..." class="form-control" />
                        </div>
                        <button id="search-button" type="button" class="btn btn-sm btn-primary">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                </div>
                <!-- Right Side Of Navbar -->
                    <li class="nav-item dropdown ms-5">
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
