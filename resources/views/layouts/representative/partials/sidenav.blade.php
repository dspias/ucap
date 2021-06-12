<!-- Start Leftbar -->
<div class="leftbar">
    <!-- Start Sidebar -->
    <div class="sidebar">
        <!-- Start Logobar -->
        <div class="logobar" style="margin-bottom: 8px; border-bottom: 0px solid #fff;">
            <a href="{{ route('superadmin.dashboard.index') }}" class="logo logo-large">
                <img src="{{ show_logo('main_logo') }}" class="img-fluid" alt="logo" />
            </a>
            <a href="{{ route('superadmin.dashboard.index') }}" class="logo logo-small">
                <img src="{{ show_logo('small_logo') }}" class="img-fluid" alt="logo" />
            </a>
        </div>
        <!-- End Logobar -->
        <!-- Start Navigationbar -->
        <div class="navigationbar">
            <ul class="vertical-menu">
                <li class="single-menu bg-ucap {{ Route::is('representative.live_chat.index') ? 'active' : '' }}">
                    <a href="{{ route('representative.live_chat.index') }}" class="text-white text-bold">
                        <i class="ti-comment"></i>
                        <span>{{ __('Live Chat') }}</span>
                        {{-- <span class="badge badge-danger pull-right">{{ __('New') }}</span> --}}
                    </a>
                </li>
                
                <div class="mb-3"></div>
                
                <li class="single-menu {{ Route::is('representative.dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('representative.dashboard.index') }}" class="{{ Route::is('representative.dashboard.index') ? 'active' : '' }}">
                        <i class="ti-bar-chart-alt"></i>
                        <span>{{ __('Dashboard') }}</span>
                        {{-- <span class="badge badge-danger pull-right">{{ __('New') }}</span> --}}
                    </a>
                </li>

                <hr>
                
                <li class="single-menu {{ Request::is('representative/my_university*') ? 'active' : '' }}">
                    <a href="{{ route('representative.university.index') }}" class="{{ Request::is('representative/my_university*') ? 'active' : '' }}">
                        <i class="fa fa-university"></i>
                        <span>{{ __('My University') }}</span>
                        {{-- <span class="badge badge-danger pull-right">{{ __('New') }}</span> --}}
                    </a>
                </li>

                <li class="nested-menu {{ Request::is('representative/application*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-envelope"></i>
                        <span>{{ __('Applications') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="{{ route('representative.application.assigned') }}" class="{{ Request::is('representative/application/assigned*') ? 'active' : '' }}">{{ __('New Assigned') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('representative.application.completed') }}" class="{{ Request::is('representative/application/completed*') ? 'active' : '' }}">{{ __('Completed') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('representative.application.rejected') }}" class="{{ Request::is('representative/application/rejected*') ? 'active' : '' }}">{{ __('Rejected') }}</a>
                        </li>
                    </ul>
                </li>

                <hr>

                <li class="nested-menu {{ Request::is('representative/settings*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-settings"></i>
                        <span>{{ __('Settings') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="{{ route('representative.settings.profile.index') }}" class="{{ Request::is('representative/settings/profile*') ? 'active' : '' }}">{{ __('Profile') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('representative.settings.security.index') }}" class="{{ Request::is('representative/settings/security*') ? 'active' : '' }}">{{ __('Security') }}</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
        <!-- End Navigationbar -->
    </div>
    <!-- End Sidebar -->
</div>
<!-- End Leftbar -->
