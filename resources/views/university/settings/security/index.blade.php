@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Security'))

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
    <b class="text-uppercase">{{ __('Security') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('Security') }}</li>
@endsection


@section('action')
    <button class="btn btn-custom" onClick="window.location.reload();">
        <i class="feather icon-refresh-cw mr-1"></i>
        {{ __('Refresh') }}
    </button>
@endsection



@section('content')

<!-- Start row -->
<div class="row justify-content-center">
    <!-- Start col -->
    <div class="col-md-6">
        <div class="card m-b-30">
            <form action="{{ route('university.settings.security.change_password') }}" method="post">
                @csrf
                {{-- <div class="card-header border bottom">
                    <h5 class="mb-0">{{ __('Create New Student') }}</h5>
                </div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="old_password">{{ __('Old Password') }}<sup class="required">*</sup></label>
                                <input type="password" minlength="8" class="form-control" value="{{ old('old_password') }}" name="old_password" placeholder="{{ __('Old Password *') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="new_password">{{ __('New Password') }}<sup class="required">*</sup></label>
                                <input type="password" minlength="8" class="form-control" value="{{ old('new_password') }}" name="new_password" placeholder="{{ __('New Password *') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="confirm_password">{{ __('Confirm New Password') }}<sup class="required">*</sup></label>
                                <input type="password" minlength="8" class="form-control" value="{{ old('confirm_password') }}" name="confirm_password" placeholder="{{ __('Confirm New Password *') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Update Password') }}</button>
                    <button type="reset" class="btn btn-danger float-right mb-2 mr-1" onclick="return confirm('Are You Sure Want To Reset?');">{{ __('Reset') }}</button>
                </div>
            </form>
        </div>
    </div>
    <!-- End col -->
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

