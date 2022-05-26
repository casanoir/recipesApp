<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm" id="header" >
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/images/logo.png" id="navLogo"/>
        </a>
        @auth
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
        @endauth
            

            
            <ul class="navbar-nav ms-auto">
                <!-- Authentication Links -->
                @auth
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
                        <!--START searchModal-->
                        <button id="search-settings" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#searchModal">
                            <i class="fas fa-cogs"></i>
                        </button>
                        <div class="modal fade" id="searchModal" tabindex="-1" aria-labelledby="searchModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="searchModalLabel">Search settings</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
                                </div>
                                </div>
                            </div>
                        </div>
                        <!--END searchModal-->
                      </div>
                </div>
                <!-- Right Side Of Navbar -->
                    <li class="nav-item dropdown ms-5">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>

                        <div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                            <a  class="dropdown-item" href="#">
                                Profile
                            </a>
                            
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
                @endauth
            </ul>
        </div>
    </div>
</nav>
