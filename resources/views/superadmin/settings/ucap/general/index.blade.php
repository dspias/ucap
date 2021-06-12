@extends('superadmin.settings.ucap.index')

@section('custom_css')
    {{-- External CSS --}}
    <style>
        .main-logo {
            position: relative;
            max-width: 100%;
            margin-bottom: 30px;
        }
        .main-logo .avatar-edit {
            position: absolute;
            right: 10px;
            z-index: 1;
            top: 10px;
        }
        .main-logo .avatar-edit input {
            display: none;
        }
        .main-logo .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 0px;
            background: #ffffff;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .main-logo .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .main-logo .avatar-edit input + label:after {
            content: "\f040";
            font-family: "FontAwesome";
            color: #757575;
            position: absolute;
            top: 7px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .main-logo .avatar-preview {
            width: 100%;
            height: 240px;
            position: relative;
            border-radius: 0px;
            border: 2px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .main-logo .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 0px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        .small-logo {
            position: relative;
            max-width: 100%;
            margin-bottom: 30px;
        }
        .small-logo .avatar-edit {
            position: absolute;
            right: 10px;
            z-index: 1;
            top: 10px;
        }
        .small-logo .avatar-edit input {
            display: none;
        }
        .small-logo .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 0px;
            background: #ffffff;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .small-logo .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .small-logo .avatar-edit input + label:after {
            content: "\f040";
            font-family: "FontAwesome";
            color: #757575;
            position: absolute;
            top: 7px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .small-logo .avatar-preview {
            width: 100%;
            height: 240px;
            position: relative;
            border-radius: 0px;
            border: 2px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .small-logo .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 0px;
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
@endsection

@section('setting_content')
    <form action="{{ route('superadmin.settings.ucap.general.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-header border bottom">
            <h5 class="mb-0">{{ __('General Settings') }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="main-logo">
                        <div class="avatar-edit">
                            <input type='file' name="main_logo" id="mainLogoUpload" accept=".png, .jpg, .jpeg" />
                            <label for="mainLogoUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="mainLogo" style="background-image: url({{ show_logo('main_logo') }});">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="small-logo">
                        <div class="avatar-edit">
                            <input type='file' name="small_logo" id="smallLogoUpload" accept=".png, .jpg, .jpeg" />
                            <label for="smallLogoUpload"></label>
                        </div>
                        <div class="avatar-preview">
                            <div id="smallLogo" style="background-image: url({{ show_logo('small_logo') }});"></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="currency_name">{{ __('System Name') }}</label>
                        <input type="text" class="form-control max-length" maxlength="25" name="app_name" id="app_name" placeholder="Enter Application Name *" value="{{ ucap_get('app_name') ?? old('app_name') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="from-group">
                        <label for="currency_name">{{ __('System Currency Name') }}</label>
                        <input type="text" class="form-control max-length" maxlength="3" name="currency_name" id="currency_name" placeholder="Enter System Currency name" value="{{ ucap_get('currency_name') ?? old('currency_name') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="from-group">
                        <label for="currency_sign">{{ __('Sytem Currency Sign') }}</label>
                        <input type="text" class="form-control max-length" maxlength="2" name="currency_sign" id="currency_sign" placeholder="Enter System Currency sign" value="{{ ucap_get('currency_sign') ?? old('currency_sign') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Update General Info') }}</button>
        </div>
    </form>
@endsection

@section('script_links')
    {{--  External Javascript Links --}}
    <!-- MaxLength js -->
    <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-maxlength.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        /*
        --------------------------------------
            : Custom - Form MaxLength js :
        --------------------------------------
        */
        "use strict";
        $(document).ready(function() {
            /* -- Form - MaxLength -- */
            $('.max-length').maxlength({
                alwaysShow: false,
                threshold: 10,
                warningClass: "badge badge-warning",
                limitReachedClass: "badge badge-danger",
                separator: ' char out of ',
                preText: 'You have used ',
                postText: ' chars.',
                validate: true
            });
        });
    </script>

    <script>
        function readMainLogoURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#mainLogo').css('background-image', 'url('+e.target.result +')');
                    $('#mainLogo').hide();
                    $('#mainLogo').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#mainLogoUpload").change(function() {
            readMainLogoURL(this);
        });
    </script>

    <script>
        function readSmallLogoURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#smallLogo').css('background-image', 'url('+e.target.result +')');
                    $('#smallLogo').hide();
                    $('#smallLogo').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#smallLogoUpload").change(function() {
            readSmallLogoURL(this);
        });
    </script>
@endsection
