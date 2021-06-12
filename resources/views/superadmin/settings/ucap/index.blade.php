@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('UCAP Settings'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('UCAP Settings') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Settings') }}</li>
    <li class="breadcrumb-item active">{{ __('UCAP Settings') }}</li>
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
    <!-- Start col -->
    <div class="col-lg-3">
        <!-- Start nav -->
        @include('superadmin.settings.ucap.partials.nav')
        <!-- end nav -->
    </div>
    <!-- End col -->
    <!-- Start col -->
    <div class="col-lg-9">
        <div class="email-rightbar">
            <div class="card m-b-30">
                <!-- Start row -->
                @yield('setting_content')
                <!-- End row -->

                {{-- <div class="card-header border bottom">
                    <h5 class="mb-0">{{ __('Title_Here') }}</h5>
                </div>
                <div class="card-body">
                    <h1>{{ __('Your_Content_Here') }}</h1>
                </div>
                <div class="card-footer">
                    <button class="btn btn-dark-rgba btn-sm float-right">{{ __('Action_Button_Title') }}</button>
                </div> --}}

            </div>
        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
