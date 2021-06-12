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
                <li class="single-menu {{ Route::is('university.dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('university.dashboard.index') }}" class="{{ Route::is('university.dashboard.index') ? 'active' : '' }}">
                        <i class="ti-bar-chart-alt"></i>
                        <span>{{ __('Dashboard') }}</span>
                        <span class="badge badge-danger pull-right">{{ __('New') }}</span>
                    </a>
                </li>

                <hr>

                <li class="nested-menu {{ Request::is('university/application*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-envelope"></i>
                        <span>{{ __('Applications') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="{{ route('university.application.all') }}" class="{{ Request::is('university/application/all*') ? 'active' : '' }}">{{ __('All') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.application.processing') }}" class="{{ Request::is('university/application/processing*') ? 'active' : '' }}">{{ __('Processing') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.application.accepted') }}" class="{{ Request::is('university/application/accepted*') ? 'active' : '' }}">{{ __('Accepted') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.application.pending') }}" class="{{ Request::is('university/application/pending*') ? 'active' : '' }}">{{ __('Pending') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.application.rejected') }}" class="{{ Request::is('university/application/rejected*') ? 'active' : '' }}">{{ __('Rejected') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nested-menu {{ Request::is('university/faculty*') ? 'active' : '' }}">
                    <a href="javascript:void(0);">
                        <i class="ti-star"></i>
                        <span>{{ __('Faculties') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="{{ route('university.faculty.all') }}" class="{{ Request::is('university/faculty/all*') ? 'active' : '' }}">{{ __('All') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.faculty.active') }}" class="{{ Request::is('university/faculty/active*') ? 'active' : '' }}">{{ __('Active') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.faculty.inactive') }}" class="{{ Request::is('university/faculty/inactive*') ? 'active' : '' }}">{{ __('Inactive') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.faculty.create') }}" class="{{ Request::is('university/faculty/create*') ? 'active' : '' }}">{{ __('Assign Faculty') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nested-menu {{ Request::is('university/program*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-ruler-pencil"></i>
                        <span>{{ __('Programs') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="{{ route('university.program.all') }}" class="{{ Request::is('university/program/all*') ? 'active' : '' }}">{{ __('All') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.program.active') }}" class="{{ Request::is('university/program/active*') ? 'active' : '' }}">{{ __('Active') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.program.inactive') }}" class="{{ Request::is('university/program/inactive*') ? 'active' : '' }}">{{ __('Inactive') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.program.create') }}" class="{{ Request::is('university/program/create*') ? 'active' : '' }}">{{ __('Assign Program') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nested-menu {{ Request::is('university/representative*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-wheelchair"></i>
                        <span>{{ __('Representatives') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="{{ route('university.representative.all') }}" class="{{ Request::is('university/representative/all*') ? 'active' : '' }}">{{ __('All') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.representative.active') }}" class="{{ Request::is('university/representative/active*') ? 'active' : '' }}">{{ __('Active') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.representative.inactive') }}" class="{{ Request::is('university/representative/inactive*') ? 'active' : '' }}">{{ __('Inactive') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.representative.create') }}" class="{{ Request::is('university/representative/create*') ? 'active' : '' }}">{{ __('Assign New') }}</a>
                        </li>
                    </ul>
                </li>

                <hr class="mb-0">

                <li class="nested-menu finance {{ Request::is('superadmin/finance*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);" class="text-bold">
                        {{-- <i class="feather icon-pie-chart"></i> --}}
                        <img src="{{ asset('assets/images/svg-icon/chart.svg') }}" class="img-fluid" alt="chart">
                        <span>{{ __('Finance') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li class="{{ Request::is('university/finance/status*') ? 'active' : '' }}">
                            <a href="{{ route('university.finance.index') }}">{{ __('Financial Status') }}</a>
                        </li>                        
                        
                        <li class="{{ Request::is('university/finance/payments*') ? 'active' : '' }}">
                            <a href="javaScript:void(0);" class="text-bold">{{ __('Payments') }}
                                <i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li class="{{ Request::is('university/finance/payments/request*') ? 'active' : '' }}">
                                    <a href="{{ route('university.finance.request') }}">{{ __('Payment Request') }}</a>
                                </li>
                                <li class="{{ Request::is('university/finance/payments/history*') ? 'active' : '' }}">
                                    <a href="{{ route('university.finance.history') }}">{{ __('Payment History') }}</a>
                                </li>
                            </ul>
                        </li>

                        <li class="{{ Request::is('university/finance/settings*') ? 'active' : '' }}">
                            <a href="{{ route('university.finance.setting') }}">{{ __('Settings') }}</a>
                        </li>
                    </ul>
                </li>

                <hr class="mt-0">

                <li class="nested-menu {{ Request::is('university/settings*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-settings"></i>
                        <span>{{ __('Settings') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="{{ route('university.settings.university.index') }}" class="{{ Request::is('university/settings/university*') ? 'active' : '' }}">{{ __('University') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.settings.profile.index') }}" class="{{ Request::is('university/settings/profile*') ? 'active' : '' }}">{{ __('Profile') }}</a>
                        </li>
                        <li>
                            <a href="{{ route('university.settings.security.index') }}" class="{{ Request::is('university/settings/security*') ? 'active' : '' }}">{{ __('Security') }}</a>
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
