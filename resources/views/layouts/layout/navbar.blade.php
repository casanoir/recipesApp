<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm" id="header" >
    <div class="container">
        @guest
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/images/logo.png" id="navLogo"/>
        </a>
        @endguest
        
        @auth
        <a class="navbar-brand" href="{{ url('/home') }}">
            <img src="/images/logo.png" id="navLogo"/>
        </a>
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

                        <div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown" data-toggle="modal" data-target="#profileModal"">
                            <a  class="dropdown-item">
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

                    <div wire:ignore.self class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profileModalLabel">profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                         <span aria-hidden="true close-btn">×</span>
                                    </button>
                                </div>
                               <div class="modal-body">
                                    {{ Auth::user()->name }}<hr>
                                    {{ Auth::user()->email }}<hr>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary close-btn" data-dismiss="modal">Close</button>
                                    <button type="button" wire:click.prevent="store()" class="btn btn-primary close-modal">Save</button>
                                </div>
                            </div>
                        </div>
                    </div>
                

                @endauth
            </ul>
        </div>
    </div>
</nav>
