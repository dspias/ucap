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
                    <a href="{{ messenger_route() }}" target="_blank" class="text-white text-bold">
                        <i class="socicon-telegram"></i>
                        <span>{{ __('Live Chat') }}</span>
                        <span class="badge badge-danger bg-white text-dark text-bold pull-right">{{ '01' }}</span>
                    </a>
                </li>

                <div class="mb-3"></div>

                <li class="single-menu {{ Route::is('superadmin.dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('superadmin.dashboard.index') }}" class="{{ Route::is('superadmin.dashboard.index') ? 'active' : '' }}">
                        <i class="ti-bar-chart-alt"></i>
                        <span>{{ __('Dashboard') }}</span>
                        {{-- <span class="badge badge-danger pull-right">{{ __('New') }}</span> --}}
                    </a>
                </li>

                <hr>

                <li class="single-menu">
                    <a href="{{ route('superadmin.student.index') }}" class="{{ Request::is('superadmin/student*') ? 'active' : '' }}">
                        <i class="ti-user"></i>
                        <span>{{ __('Students') }}</span>
                    </a>
                </li>

                <li class="nested-menu {{ Request::is('superadmin/university*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="sl-icon-graduation"></i>
                        <span>{{ __('University') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li class="{{ Request::is('superadmin/university/all*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.university.index') }}">{{ __('All') }}</a>
                        </li>
                        <li class="{{ Request::is('superadmin/university/active*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.university.active') }}">{{ __('Active') }}</a>
                        </li>
                        <li class="{{ Request::is('superadmin/university/inactive*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.university.inactive') }}">{{ __('Inactive') }}</a>
                        </li>
                        <li class="{{ Request::is('superadmin/university/create*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.university.create') }}">{{ __('Add New') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nested-menu {{ Request::is('superadmin/representative*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-wheelchair"></i>
                        <span>{{ __('Representative') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li class="{{ Request::is('superadmin/representative/all*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.representative.index') }}">{{ __('All') }}</a>
                        </li>
                        <li class="{{ Request::is('superadmin/representative/active*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.representative.active') }}">{{ __('Active') }}</a>
                        </li>
                        <li class="{{ Request::is('superadmin/representative/inactive*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.representative.inactive') }}">{{ __('Inactive') }}</a>
                        </li>
                        <li class="{{ Request::is('superadmin/representative/create*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.representative.create') }}">{{ __('Add New') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nested-menu {{ Request::is('superadmin/application*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-envelope"></i>
                        <span>{{ __('Applications') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li class=" {{ Request::is('superadmin/application/all*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.application.index') }}">{{ __('All') }}</a>
                        </li>
                        <li class=" {{ Request::is('superadmin/application/pending*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.application.pending') }}">{{ __('Pending') }}</a>
                        </li>
                        <li class=" {{ Request::is('superadmin/application/processing*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.application.processing') }}">{{ __('Processing') }}</a>
                        </li>
                        <li class=" {{ Request::is('superadmin/application/approved*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.application.approved') }}">{{ __('Approved') }}</a>
                        </li>
                        <li class=" {{ Request::is('superadmin/application/rejected*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.application.rejected') }}">{{ __('Rejected') }}</a>
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
                        <li class="{{ Request::is('superadmin/finance/status*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.finance.index') }}">{{ __('Status') }}</a>
                        </li>

                        <li class="{{ Request::is('superadmin/finance/payments*') ? 'active' : '' }}">
                            <a href="javaScript:void(0);" class="text-bold">{{ __('Payments') }}
                                <i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li class="{{ Request::is('superadmin/finance/payments/all*') ? 'active' : '' }}">
                                    <a href="{{ route('superadmin.finance.all') }}">{{ __('All Payments') }}</a>
                                </li>
                                <li class="{{ Request::is('superadmin/finance/payments/request*') ? 'active' : '' }}">
                                    <a href="{{ route('superadmin.finance.request') }}">{{ __('Payment Request') }}</a>
                                </li>
                            </ul>
                        </li>

                        <li class="{{ Request::is('superadmin/finance/settings*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.finance.setting') }}">{{ __('Settings') }}</a>
                        </li>
                    </ul>
                </li>

                <hr class="mt-0">

                <li class="nested-menu {{ Request::is('superadmin/administrator*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-plug"></i>
                        <span>{{ __('Administrator') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li class="{{ Request::is('superadmin/administrator/admins*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.administrator.index') }}">{{ __('UCAP Admins') }}</a>
                        </li>
                        <li class="{{ Request::is('superadmin/administrator/create*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.administrator.create') }}">{{ __('Add New') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nested-menu {{ Request::is('superadmin/centre/ucap_centre*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-headphone-alt"></i>
                        <span>{{ __('UCAP Centre') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li class="">
                            <a href="{{ route('superadmin.centre.index') }}">{{ __('UCAP Centres') }}</a>
                        </li>
                        <li class="">
                            <a href="{{ route('superadmin.centre.create') }}">{{ __('Add New') }}</a>
                        </li>
                    </ul>
                </li>

                <li class="nested-menu {{ Request::is('superadmin/settings*') ? 'active' : '' }}">
                    <a href="javaScript:void(0);">
                        <i class="ti-settings"></i>
                        <span>{{ __('Settings') }}</span>
                        <i class="feather icon-chevron-right pull-right"></i>
                    </a>
                    <ul class="vertical-submenu">
                        <li>
                            <a href="{{ route('superadmin.settings.ucap.general.index') }}" class="{{ Request::is('superadmin/settings/ucap*') ? 'active' : '' }}">{{ __('UCAP') }}</a>
                        </li>
                        <li class="">
                            <a href="javaScript:void(0);" class="text-bold">{{ __('Address') }}
                                <i class="feather icon-chevron-right pull-right"></i>
                            </a>
                            <ul class="vertical-submenu">
                                <li class="">
                                    <a href="{{ route('superadmin.settings.address.country.index') }}">{{ __('Country') }}</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('superadmin.settings.address.state.index') }}">{{ __('Province') }}</a>
                                </li>
                                <li class="">
                                    <a href="{{ route('superadmin.settings.address.city.index') }}">{{ __('City') }}</a>
                                </li>
                            </ul>
                        </li>

                        <li class="{{ Request::is('superadmin/settings/offer*') ? 'active' : '' }}">
                            <a href="{{ route('superadmin.settings.offer.index') }}" class="{{ Request::is('superadmin/settings/offer*') ? 'active' : '' }}">{{ __('Offers') }}</a>
                        </li>

                        <li class="">
                            <a href="{{ route('superadmin.settings.payment.index') }}" class="{{ Request::is('superadmin/settings/payment*') ? 'active' : '' }}">{{ __('Payment Gateways') }}</a>
                        </li>

                        <li class="">
                            <a href="{{ route('superadmin.settings.languageexam.index') }}" class="{{ Request::is('superadmin/settings/languageexam*') ? 'active' : '' }}">{{ __('Language Tests') }}</a>
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
