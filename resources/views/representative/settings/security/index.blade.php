@extends('layouts.representative.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Security'))

@section('css_links')
{{-- CSS Links --}}
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
    <li class="breadcrumb-item">{{ __('Settings') }}</li>
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
            <form action="{{ route('representative.settings.security.change_password') }}" method="post">
                @csrf
                {{-- <div class="card-header border bottom">
                    <h5 class="mb-0">{{ __('Create New Student') }}</h5>
                </div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group">
                                <label for="old_password">{{ __('Old Password') }}<sup class="required">*</sup></label>
                                <input type="password" class="form-control" name="old_password" placeholder="{{ __('Ex: 12345678') }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="password">{{ __('New Password') }}<sup class="required">*</sup></label>
                                <input type="password" class="form-control" name="password" placeholder="{{ __('Ex: 12345678') }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group">
                                <label for="confirm_password">{{ __('Confirm Password') }}<sup class="required">*</sup></label>
                                <input type="password" class="form-control" name="confirm_password" placeholder="{{ __('Ex: 12345678') }}" required>
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection

