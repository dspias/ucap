<div class="topbar">
    <!-- Start row -->
    <div class="row align-items-center">
        <!-- Start col -->
        <div class="col-md-12 align-self-center">
            <div class="togglebar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="menubar">
                            <a class="menu-hamburger" href="javascript:void();">
                                <i class="fa fa-sliders" style="font-size: 24px;"></i>
                            </a>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="searchbar">
                            <form>
                                <div class="input-group">
                                    <input type="search" class="form-control" placeholder="Search" aria-label="Search" aria-describedby="button-addon2" />
                                    <div class="input-group-append">
                                        <button class="btn" type="submit" id="button-addon2">
                                            <i class="ti-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="infobar">
                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <div class="notifybar">
                            <div class="dropdown">
                                <a class="dropdown-toggle infobar-icon" href="#" role="button" id="notoficationlink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <img src="{{ asset('assets/images/svg-icon/notifications.svg') }}" class="img-fluid" alt="notifications" /> <span class="live-icon"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="notoficationlink">
                                    <div class="notification-dropdown-title">
                                        <h4>Notifications</h4>
                                    </div>
                                    <ul class="list-unstyled">
                                        <li class="media dropdown-item">
                                            <span class="action-icon badge badge-primary-inverse"><i class="feather icon-dollar-sign"></i></span>
                                            <div class="media-body">
                                                <h5 class="action-title">$135 received</h5>
                                                <p><span class="timing">Today, 10:45 AM</span></p>
                                            </div>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="action-icon badge badge-success-inverse"><i class="feather icon-file"></i></span>
                                            <div class="media-body">
                                                <h5 class="action-title">Project X prototype approved</h5>
                                                <p><span class="timing">Yesterday, 01:40 PM</span></p>
                                            </div>
                                        </li>
                                        <li class="media dropdown-item">
                                            <span class="action-icon badge badge-danger-inverse"><i class="feather icon-eye"></i></span>
                                            <div class="media-body">
                                                <h5 class="action-title">John requested to view wireframe</h5>
                                                <p><span class="timing">3 Sep 2019, 05:22 PM</span></p>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="languagebar">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="#" role="button" id="languagelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="flag flag-icon-@if(auth()->user()->lang == 'en'){{ 'us' }}@elseif(auth()->user()->lang == 'ban'){{ 'bd' }}@else{{ 'en' }}@endif flag-icon-squared"></i></a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="languagelink">
                                    <a class="dropdown-item @if(auth()->user()->lang == 'en'){{ 'active' }}@endif" href="{{ route('guest.homepage.change_lang', ['lang' => 'en']) }}" onclick="event.preventDefault(); document.getElementById('change_lang_en').submit();">
                                        <i class="flag flag-icon-us flag-icon-squared"></i>
                                        English
                                    </a>
                                    <form id="change_lang_en" action="{{ route('guest.homepage.change_lang', ['lang' => 'en']) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>

                                    <a class="dropdown-item @if(auth()->user()->lang == 'ban'){{ 'active' }}@endif" href="{{ route('guest.homepage.change_lang', ['lang' => 'ban']) }}" onclick="event.preventDefault(); document.getElementById('change_lang_ban').submit();">
                                        <i class="flag flag-icon-bd flag-icon-squared"></i>
                                        বাংলা
                                    </a>
                                    <form id="change_lang_ban" action="{{ route('guest.homepage.change_lang', ['lang' => 'ban']) }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    {{-- <a class="dropdown-item" href="#">
                                        <i class="flag flag-icon-in flag-icon-squared"></i>
                                        हिन्दी
                                    </a> --}}
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-inline-item">
                        <div class="profilebar">
                            <div class="dropdown">
                                <a class="dropdown-toggle" href="javascript:void(0);" role="button" id="profilelink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    @if(!is_null($url = has_media(auth()->user()->superadmin, 'avatar', 'thumb')))
                                        <img src="{{ show_image($url) }}" class="img-fluid" alt="profile" />
                                    @else
                                        <img src="{{ asset('assets/images/users/profile.svg') }}" class="img-fluid" alt="profile" />
                                    @endif
                                    <span class="feather icon-chevron-down live-icon"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="profilelink">
                                    <div class="dropdown-item">
                                        <div class="profilename">
                                            <h5>{{ __(auth()->user()->name) }}</h5>
                                        </div>
                                    </div>
                                    <div class="userbox">
                                        <ul class="list-unstyled mb-0">
                                            <li class="media dropdown-item">
                                                <a href="{{ route('representative.settings.profile.index') }}" class="profile-icon">
                                                    <i class="ti-user"></i>
                                                    <span class="pl-2">{{ __('Profile') }}</span>
                                                </a>
                                            </li>
                                            <li class="media dropdown-item">
                                                <a href="javascript:void(0);" onclick="event.preventDefault(); document.getElementById('submitLogoutForm').submit();" class="profile-icon">
                                                    <i class="ti-power-off"></i>
                                                    <span class="pl-2">{{ __('Logout') }}</span>
                                                </a>
                                                <form id="submitLogoutForm" action="{{ route('logout') }}" method="POST" style="display: none;">
                                                    @csrf
                                                </form>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- End col -->
    </div>
    <!-- End row -->
</div>
