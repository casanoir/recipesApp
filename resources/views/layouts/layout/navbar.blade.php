<nav class="navbar navbar-expand-lg navbar-dark bg-dark shadow-sm" id="header" >
    <div id="navContainer" class="container">
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
                <i class="fas fa-bars"></i>
            </button>
        @endauth

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
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
            
                    <!--searchbar-->
                    <div class="searchBar me-5">
                        @livewire('components.search-bar')
                    </div>

                    <!-- Right Side Of Navbar -->
                    <li class="nav-item dropdown ms-5">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->firstName }}
                        </a>
                                    
                        <div class="dropdown-menu dropdown-menu-end text-center" aria-labelledby="navbarDropdown">
                            {{-- profile modal btn start  --}}
                            <div data-toggle="modal" data-target="#profileModal">
                                <a  class="dropdown-item">
                                    Profile
                                </a>
                            </div>
                            {{-- end profile btn modal --}}
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


                    {{-- start profile modal --}}
                    <div wire:ignore.self class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="profileModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="profileModalLabel">profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true close-btn">×</span>
                                    </button>
                                </div>
                                @livewire('modals.profile-modal')
                            </div>
                        </div>
                    </div>
                    {{-- end profile modal --}}
                @endauth
            </ul>
        </div>
    </div>
</nav>
