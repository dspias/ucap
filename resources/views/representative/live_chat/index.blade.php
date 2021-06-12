@extends('layouts.representative.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Live Chat'))

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
    .breadcrumbbar{
        display: none !important;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Live Chat') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('Live Chat') }}</li>
@endsection


@section('action')
    <button class="btn btn-custom" onClick="window.location.reload();">
        <i class="feather icon-refresh-cw mr-1"></i>
        {{ __('Refresh') }}
    </button>
@endsection



@section('content')

<!-- Start row -->
<div class="row" style="margin-top: 60px;">
    <div class="col-12">
        Your Chat Content Here
    </div>
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

