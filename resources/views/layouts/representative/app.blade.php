<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Meta Starts --}}
        @include('layouts.representative.partials.metas')
        {{-- Meta Ends --}}

        {{--  Page Title  --}}
        <title> {{ app_name() }} | {{ __(auth()->user()->role->name) }} | @yield('page_title') </title>
        <!-- Fevicon -->
        <link rel="shortcut icon" href="{{ show_logo('small_logo') }}" />

        <!-- Start css -->
        @include('layouts.representative.partials.stylesheet')
        <!-- End css -->
    </head>


    <body class="vertical-layout">
        <!-- Start Containerbar -->
        <div id="containerbar">
            <!-- Start Leftbar -->
            @include('layouts.representative.partials.sidenav')
            <!-- End Leftbar -->

            <!-- Start Rightbar -->
            <div class="rightbar">
                <!-- Start Topbar Mobile -->
                @include('layouts.representative.partials.topnav_mobile')
                <!-- Start Topbar -->
                @include('layouts.representative.partials.topnav')
                <!-- End Topbar -->

                <!-- Start Breadcrumbbar -->
                @include('layouts.representative.partials.breadcrumb')
                <!-- End Breadcrumbbar -->

                <!-- Start Contentbar -->
                <div class="contentbar">
                    <!-- Start row -->
                        @yield('content')
                    <!-- End row -->
                </div>
                <!-- End Contentbar -->

                @include('sweetalert::alert')

                <!-- Start Footerbar -->
                @include('layouts.representative.partials.footer')
                <!-- End Footerbar -->
            </div>
            <!-- End Rightbar -->
        </div>
        <!-- End Containerbar -->



        <!-- Start js -->
        @include('layouts.representative.partials.scripts')
        <!-- End js -->
    </body>
</html>
