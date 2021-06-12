<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
		<meta name="author" content="{{ app_url() }}" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        {{--  Page Title  --}}
        <title> {{ app_name() }} | @yield('page_title') </title>
        <!-- Fevicon -->
        <link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}" />

        @yield('css_links')

        <!-- Custom CSS -->
        <link href="{{ asset('frontend/assets/css/styles.css') }}" rel="stylesheet">

		<!-- Custom Color Option -->
		<link href="{{ asset('frontend/assets/css/colors.css') }}" rel="stylesheet">


		<link href="{{ asset('frontend/assets/css/custom.css') }}" rel="stylesheet">
        {{-- <link rel="stylesheet" href="{{ asset('assets/icons/css/typicons.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('assets/css/icons.css') }}">

        @yield('custom_css')
    </head>

    <body class="red-skin">

        <!-- ============================================================== -->
        <!-- Preloader - style you can find in spinners.css -->
        <!-- ============================================================== -->
        <div id="preloader">
            <div class="preloader">
                <span></span>
                <span></span>
            </div>
        </div>


        <!-- ============================================================== -->
        <!-- Main wrapper - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <div id="main-wrapper">
            <!-- Start Navbar -->
            @include('layouts.student.partials.navbar')
            <!-- End Navbar -->


            <!-- Start Contentbar -->
            <section class="main-content-section p-0">
                <!-- Start Content -->
                @yield('content')
                <!-- End Content -->
            </section>
            <!-- End Contentbar -->


            <!-- Start newsletter -->
            @include('layouts.student.partials.newsletter')
            <!-- End newsletter -->

            <!-- Start footer -->
            @include('layouts.student.partials.footer')
            <!-- End footer -->


            <!-- Start login_modal -->
            @include('layouts.student.partials.login_modal')
            <!-- End login_modal -->


            <!-- Start register_modal -->
            @include('layouts.student.partials.register_modal')
            <!-- End register_modal -->

            <a id="back2Top" class="top-scroll" title="Back to top" href="#"><i class="ti-arrow-up"></i></a>

            {{-- =========< If there is any item in cart then addClass="hasItem" >========== --}}
            @php
                $cart = Cart::get();
                $carted = count((array)$cart['programs']);
            @endphp
            <a id="studentCart" class="student-cart @if($carted > 0)hasItem @endif @if($carted <= 0)d-none @endif" data-toggle="tooltip" data-title="{{ __('View Cart') }}" href="{{ route('student.cart.index') }}">
                <i class="ti-shopping-cart-full"></i>
                <span class="badge badge-dark">{{ $carted }}</span>
            </a>

            {{-- =========< If there is any item in Compare then addClass="hasToCompare" in a >========== --}}
            {{-- =========< If there is no item in Compare then addClass="d-none" in a >========== --}}
            @php
                $compare = Compare::get();
                $compared = count((array)$compare['programs']);
            @endphp
            <a id="compareBasket" class="compare-basket @if($compared > 0)hasToCompare @endif @if($compared <= 0)d-none @endif" data-toggle="tooltip" data-title="{{ __('View Compare Basket') }}" href="{{ route('student.compare.index') }}">
                <i class="typcn typcn-flow-merge"></i>
                <span class="badge badge-dark">{{ $compared }}</span>
            </a>
        </div>

        @include('sweetalert::alert')

		<!-- ============================================================== -->
		<!-- End Wrapper -->
		<!-- ============================================================== -->

		<!-- ============================================================== -->
		<!-- All Jquery -->
		<!-- ============================================================== -->
        @yield('script_links')

		<script src="{{ asset('frontend/assets/js/jquery.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/popper.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/bootstrap.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/select2.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/slick.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/jquery.counterup.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/counterup.min.js') }}"></script>
		<script src="{{ asset('frontend/assets/js/custom.js') }}"></script>

        {{-- Sweet Alert 2 --}}
        <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert.custom.js') }}"></script>

        @yield('custom_script')
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

	</body>
</html>
