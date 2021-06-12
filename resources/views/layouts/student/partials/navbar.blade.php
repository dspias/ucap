<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
<!-- Start Navigation -->
<div class="header header-light">
    <div class="container">
        <nav id="navigation" class="navigation navigation-landscape">
            <div class="nav-header">
                <a class="nav-brand" href="{{ route('guest.homepage.index') }}">
                    <img src="{{ show_logo('main_logo') }}" class="logo" alt="" />
                    {{-- <img src="{{ asset('assets/images/logo.png') }}" class="logo" alt="" /> --}}
                </a>
                <div class="nav-toggle"></div>
            </div>
            <div class="nav-menus-wrapper" style="transition-property: none;">
                <ul class="nav-menu">
                    {{-- <li>
                        <a href="{{ route('guest.homepage.index') }}">{{ __('Home') }}</a>
                    </li> --}}

                    @auth
                        @if (auth()->user()->role_id == 5)
                            <li>
                                <a href="{{ route('student.dashboard.index') }}">{{ __('Dashboard') }}</a>
                            </li>
                        @endif
                    @endauth
                    {{-- <li>
                        <a href="{{ route('guest.country.index') }}">{{ __('Countries') }}</a>
                    </li> --}}
                    <li>
                        <a href="{{ route('guest.university.index') }}">{{ __('Universities') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('guest.faculty.index') }}">{{ __('Faculties') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('guest.program.index') }}">{{ __('Programs') }}</a>
                    </li>

                    {{-- <li>
                        <a href="{{ route('guest.about.index') }}">{{ __('About') }}</a>
                    </li>
                    <li>
                        <a href="{{ route('guest.contact.index') }}">{{ __('Contact') }}</a>
                    </li> --}}
                </ul>

                <ul class="nav-menu nav-menu-social align-to-right">
                    {{-- <li class="login_click search">
                        <a class="btn btn-dark rounded bg-ucap" href="{{ route('guest.search.index') }}" style="padding: 8.5px 15px; margin-top: 11px;">
                            <i class="ti-search" style="font-weight: bold; font-size: 20px;"></i>
                        </a>
                    </li> --}}
                    @if (Route::has('login'))
                        @auth
                            <li class="login_click light">
                                <a href="{{ route('student.profile.index') }}">{{ __('Profile') }}</a>
                            </li>
                            <li class="login_click theme-bg">
                                <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('submitLogoutForm').submit();">{{ __('Logout') }}</a>

                                <form id="submitLogoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </li>
                        @else
                            <li class="login_click light">
                                {{-- <a href="#" data-toggle="modal" data-target="#login">Sign in</a> --}}
                                <a href="{{ route('login') }}">{{ __('Sign in') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="login_click theme-bg">
                                    {{-- <a href="#" data-toggle="modal" data-target="#signup">Sign up</a> --}}
                                    <a href="{{ route('register') }}">{{ __('Sign up') }}</a>
                                </li>
                            @endif
                        @endauth
                    @endif
                </ul>
            </div>
        </nav>
    </div>
</div>
<!-- End Navigation -->
<div class="clearfix"></div>
<!-- ============================================================== -->
<!-- Top header  -->
<!-- ============================================================== -->
