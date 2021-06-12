<div class="breadcrumbbar">
    <div class="row align-items-center">
        <div class="col-md-8 col-lg-8">
            <h4 class="page-title">@yield('page_name')</h4>
            <div class="breadcrumb-list">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{ route('university.dashboard.index') }}">
                            <i class="fa fa-home"></i>
                        </a>
                    </li>
                    @yield('breadcrumb')
                </ol>
            </div>
        </div>
        <div class="col-md-4 col-lg-4">
            <div class="widgetbar">
                @yield('action')
            </div>                        
        </div>
    </div>          
</div>