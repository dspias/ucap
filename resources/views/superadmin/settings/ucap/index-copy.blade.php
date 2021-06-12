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
    <div class="col-md-12 col-lg-12 col-xl-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="row">
                    <div class="col-12 col-md-3 col-lg-3 col-xl-3">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="general-settings-tab" data-toggle="pill" href="#general-settings" role="tab" aria-controls="general-settings" aria-selected="false">{{ __('General Settings') }}</a>
                            <a class="nav-link" id="mail-settings-tab" data-toggle="pill" href="#mail-settings" role="tab" aria-controls="mail-settings" aria-selected="false">{{ __('Mail Settings') }}</a>
                            <a class="nav-link" id="contact-settings-tab" data-toggle="pill" href="#contact-settings" role="tab" aria-controls="contact-settings" aria-selected="false">{{ __('Contact Settings') }}</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-9 col-lg-9 col-xl-9">
                        <div class="tab-content" id="v-pills-tabContent">
                            <div class="tab-pane fade active show" id="general-settings" role="tabpanel" aria-labelledby="general-settings-tab">
                                <h2>General Settings</h2>
                            </div>
                            <div class="tab-pane fade" id="mail-settings" role="tabpanel" aria-labelledby="mail-settings-tab">
                                <h2>Mail Settings</h2>
                            </div>
                            <div class="tab-pane fade" id="contact-settings" role="tabpanel" aria-labelledby="contact-settings-tab">
                                <h2>Contact Settings</h2>
                            </div>
                        </div>
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
