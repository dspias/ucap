@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Dashboard'))

@section('css_links')
    {{--  External CSS  --}}
    {{-- <!-- Apex css -->
    <link href="{{ asset('assets/plugins/apexcharts/apexcharts.css') }}" rel="stylesheet">
    <!-- Slick css -->
    <link href="{{ asset('assets/plugins/slick/slick.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/slick/slick-theme.css') }}" rel="stylesheet"> --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Dashboard') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('Dashboard') }}</li>
@endsection


@section('action')
    <button class="btn btn-custom" onClick="window.location.reload();">
        <i class="feather icon-refresh-cw mr-1"></i>
        {{ __('Refresh') }}
    </button>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <div class="col-6 col-md-3 col-lg-3 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse">
                        <i class="ti-world"></i>
                    </span>
                    <div class="media-body">
                        <p class="mb-0">{{ __('Countries') }}</p>
                        <h5 class="mb-0">{{ __('12') }}</h5>                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3 col-lg-3 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse">
                        <i class="ti-crown"></i>
                    </span>
                    <div class="media-body">
                        <p class="mb-0">{{ __('Universities') }}</p>
                        <h5 class="mb-0">{{ __('200') }}</h5>                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3 col-lg-3 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse">
                        <i class="ti-user"></i>
                    </span>
                    <div class="media-body">
                        <p class="mb-0">{{ __('Students') }}</p>
                        <h5 class="mb-0">{{ __('3000') }}</h5>                      
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-6 col-md-3 col-lg-3 col-xl-3">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="media">
                    <span class="align-self-center mr-3 action-icon badge badge-secondary-inverse">
                        <i class="ti-envelope"></i>
                    </span>
                    <div class="media-body">
                        <p class="mb-0">{{ __('Applications') }}</p>
                        <h5 class="mb-0">{{ __('30000') }}</h5>                      
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    {{-- <script src="{{ asset('assets/plugins/apexcharts/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/apexcharts/irregular-data-series.js') }}"></script>
    <!-- Slick js -->
    <script  src="{{ asset('assets/plugins/slick/slick.min.js') }}"></script>
    <!-- Custom Dashboard js -->   
    <script  src="{{ asset('assets/js/custom/custom-dashboard.js') }}"></script> --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection

