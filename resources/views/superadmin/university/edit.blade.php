@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Universities'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        .avatar-upload {
            position: relative;
            max-width: 100%;
            margin-bottom: 30px;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 10px;
            z-index: 1;
            top: 10px;
        }
        .avatar-upload .avatar-edit input {
            display: none;
        }
        .avatar-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 10px;
            background: #ffffff;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .avatar-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .avatar-upload .avatar-edit input + label:after {
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
        .avatar-upload .avatar-preview {
            width: 100%;
            height: 240px;
            position: relative;
            border-radius: 16px;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }



        .cover-upload {
            position: relative;
            max-width: 100%;
            margin-bottom: 30px;
        }
        .cover-upload .avatar-edit {
            position: absolute;
            right: 10px;
            z-index: 1;
            top: 10px;
        }
        .cover-upload .avatar-edit input {
            display: none;
        }
        .cover-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 10px;
            background: #ffffff;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .cover-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .cover-upload .avatar-edit input + label:after {
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
        .cover-upload .avatar-preview {
            width: 100%;
            height: 240px;
            position: relative;
            border-radius: 16px;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .cover-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }



        .admin-upload {
            position: relative;
            max-width: 240px;
            margin: 30px auto;
            margin-top: 0px;
        }
        .admin-upload .avatar-edit {
            position: absolute;
            right: 10px;
            z-index: 1;
            top: 10px;
        }
        .admin-upload .avatar-edit input {
            display: none;
        }
        .admin-upload .avatar-edit input + label {
            display: inline-block;
            width: 34px;
            height: 34px;
            margin-bottom: 0;
            border-radius: 10px;
            background: #ffffff;
            border: 1px solid transparent;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
            cursor: pointer;
            font-weight: normal;
            transition: all 0.2s ease-in-out;
        }
        .admin-upload .avatar-edit input + label:hover {
            background: #f1f1f1;
            border-color: #d6d6d6;
        }
        .admin-upload .avatar-edit input + label:after {
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
        .admin-upload .avatar-preview {
            width: 240px;
            height: 240px;
            position: relative;
            border-radius: 16px;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .admin-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 10px;
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }


        .select2-dropdown {
            background-color: #ffffff;
            border: none;
            border-radius: 3px;
            box-shadow: 0px 0px 5px 2px rgb(0 0 0 / 15%) !important;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #d4d4d4;
            height: 36px;
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Assign New University') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Universities') }}</li>
    <li class="breadcrumb-item active">{{ __('Assign New University') }}</li>
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
    <div class="col-md-12">
        <div class="card m-b-30">
            <form action="{{ route('superadmin.university.update', [$university->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <div class="card-header border bottom">
                    <h5 class="mb-0">{{ __('Create New Student') }}</h5>
                </div> --}}
                <div class="card-body">
                    <div class="row">
                        {{-- ==================< University Details >============== --}}
                        <div class="col-12">
                            <h4 class="text-dark text-bold m-b-0 mb-0"><span class="text-ucap">{{ __('University ') }}</span>{{ __('Details') }}</h4>
                            <hr>
                        </div>

                        <div class="col-md-4">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="logo" id="avatarUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="avatarUpload"></label>
                                </div>
                                @if(!is_null($url = has_media($university->university, 'logo', 'thumb')))
                                    <div class="avatar-preview">
                                        <div id="avatarPreview" style="background-image: url({{ show_image($url) }});">
                                        </div>
                                    </div>
                                @else
                                    <div class="avatar-preview">
                                        <div id="avatarPreview" style="background-image: url(https://via.placeholder.com/500x500?text=Upload+Logo);">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="cover-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="cover" id="coverUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="coverUpload"></label>
                                </div>
                                @if(!is_null($url = has_media($university->university, 'cover', 'thumb')))
                                    <div class="avatar-preview">
                                        <div id="avatarPreview" style="background-image: url({{ show_image($url) }});">
                                        </div>
                                    </div>
                                @else
                                    <div class="avatar-preview">
                                        <div id="coverPreview" style="background-image: url(https://via.placeholder.com/1280x500?text=Upload+Cover+Photo);">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name">{{ __('University Name') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" value="{{ $university->name ?? old('name') }}" name="name" placeholder="{{ __('University Name *') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="contact_email">{{ __('University Email') }}<sup class="required">*</sup></label>
                                <input type="email" class="form-control" value="{{ optional($university->university)->email ?? old('contact_email') }}" name="contact_email" placeholder="{{ __('Ex: university@mail.com *') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="phone">{{ __('University Phone') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" value="{{ optional($university->university)->phone ?? old('phone') }}" name="phone" placeholder="{{ __('University Phone *') }}" required>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="country">{{ __('Select Country') }} <sup class="required">*</sup></label>
                                <select class="select2-single form-control" name="country" id="country" required >
                                    <option value="" aria-disabled="true" >{{ __('Select Country *') }}</option>
                                    @foreach($countries as $country)
                                        <option @if( optional(optional(optional($university->university)->city)->state)->country_id == $country->id) selected @endif value="{{ $country->id }}">{{ $country->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="state">{{ __('Select Province') }} <sup class="required">*</sup></label>
                                <select class="select2-single form-control" name="state" id="state" required >
                                    <option value="" aria-disabled="true" >{{ __('Select State *') }}</option>
                                    <option value="{{ optional(optional(optional($university->university)->city)->state)->id }}" selected>{{ optional(optional(optional($university->university)->city)->state)->name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city">{{ __('City') }}<sup class="required">*</sup></label>
                                <select name="city" class="cities select2-single form-control" id="city" required >
                                    <option value="{{ optional(optional($university->university)->city)->id }}" selected>{{ optional(optional($university->university)->city)->name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="post_code">{{ __('Postal Code') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" value="{{ optional($university->university)->post_code ?? old('post_code') }}" name="post_code" placeholder="{{ __('Postal Code *') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">{{ __('University Address') }}<sup class="required">*</sup></label>
                                <textarea rows="3" class="form-control" name="address" placeholder="{{ __('University Address *') }}" required>{{ optional($university->university)->address ?? old('address') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="about">{{ __('About University') }}</label>
                                <textarea rows="3" class="form-control" name="about" placeholder="{{ __('About University *') }}">{{ optional($university->university)->about ?? old('about') }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="is_scholarship">{{ __('Offer Scholarship?') }} </label>
                                <select class="select2-single form-control" value="{{ optional($university->university)->is_scholarship ?? old('is_scholarship') }}" name="is_scholarship" id="is_scholarship" >
                                    <option value="" aria-disabled="true" >{{ __('Select Answer *') }}</option>
                                    <option @if( optional($university->university)->is_scholarship == 1) selected @endif value="1">{{ __('Yes') }}</option>
                                    <option @if( optional($university->university)->is_scholarship == 0) selected @endif value="0">{{ __('No') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="is_transport">{{ __('Transport?') }} </label>
                                <select class="select2-single form-control" value="{{ optional($university->university)->is_transport ?? old('is_transport') }}" name="is_transport" id="is_transport" >
                                    <option value="" aria-disabled="true" >{{ __('Select Answer *') }}</option>
                                    <option @if( optional($university->university)->is_transport == 1) selected @endif value="1">{{ __('Yes') }}</option>
                                    <option @if( optional($university->university)->is_transport == 0) selected @endif value="0">{{ __('No') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="student_number">{{ __('Students') }} </label>
                                <input type="number" min="0" step="1" class="form-control" value="{{ optional($university->university)->student_number ?? old('student_number') }}" name="student_number" placeholder="{{ __('Ex: 2000') }}">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="living_cost">{{ __('Living Cost') }} <sup>{{ ucap_get('currency_sign') }}({{ ucap_get('currency_name') }})</sup></label>
                                <input type="number" min="0" step="1" class="form-control" value="{{ optional($university->university)->living_cost ?? old('living_cost') }}" name="living_cost" placeholder="{{ __('Ex: 2000') }}">
                                <small class="text-ucap">({{ __('Approximate') }})</small>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="weather">{{ __('Weather') }} <sup>({{ __('°C') }})</sup></label>
                                <input type="number" min="-10" step="1" class="form-control" value="{{ optional($university->university)->weather ?? old('weather') }}" name="weather" placeholder="{{ __('Ex: -1°') }}">
                                <small class="text-ucap">({{ __('Average') }})</small>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="website">{{ __('Website') }}</label>
                                <input type="url" class="form-control" value="{{ optional($university->university)->website ?? old('website') }}" name="website" placeholder="{{ __('Ex: https://university.com') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="facebook">{{ __('Facebook Page') }}</label>
                                <input type="url" class="form-control" value="{{ optional($university->university)->facebook ?? old('facebook') }}" name="facebook" placeholder="{{ __('Ex: https://facebook.com/universityPage') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="twitter">{{ __('Twitter') }}</label>
                                <input type="url" class="form-control" value="{{ optional($university->university)->twitter ?? old('twitter') }}" name="twitter" placeholder="{{ __('Ex: https://twitter.com/universityPage') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="linkedin">{{ __('Linkedin') }}</label>
                                <input type="url" class="form-control" value="{{ optional($university->university)->linkedin ?? old('linkedin') }}" name="linkedin" placeholder="{{ __('Ex: https://linkedin.com/universityPage') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="instagram">{{ __('Instagram') }}</label>
                                <input type="url" class="form-control" value="{{ optional($university->university)->instagram ?? old('instagram') }}" name="instagram" placeholder="{{ __('Ex: https://instagram.com/universityPage') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="whatsapp">{{ __('Whatsapp Number') }}</label>
                                <input type="text" class="form-control" value="{{ optional($university->university)->whatsapp ?? old('whatsapp') }}" name="whatsapp" placeholder="{{ __('Ex: +8801712345678') }}">
                            </div>
                        </div>

                        {{-- ==================< University Admin Details >============== --}}
                        <div class="col-12 m-t-20">
                            <h4 class="text-dark text-bold m-b-0 mb-0"><span class="text-ucap">{{ __('University Admin ') }}</span>{{ __('Details') }}</h4>
                            <hr>
                        </div>


                        <div class="col-md-12">
                            <div class="admin-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="admin" id="adminUpload" accept=".png, .jpg, .jpeg" />
                                    <label for="adminUpload"></label>
                                </div>

                                @if(!is_null($url = has_media($university->university, 'admin', 'thumb')))
                                    <div class="avatar-preview">
                                        <div id="adminPreview" style="background-image: url({{ show_image($url) }});">
                                        </div>
                                    </div>
                                @else
                                    <div class="avatar-preview">
                                        <div id="adminPreview" style="background-image: url(https://via.placeholder.com/500x500?text=Upload+Avatar);">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="admin_name">{{ __('Authorized Person Name (University Admin)') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" name="admin_name" value="{{ optional($university->university)->admin_name ?? old('admin_name') }}" placeholder="Ex: Mr. Jhon Doe" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">{{ __('Gender') }}<sup class="required">*</sup></label>
                                <select class="select2-single form-control" name="gender" value="{{ optional($university->university)->data_name ?? old('gender') }}" id="gender" required >
                                    <option value="" aria-disabled="true" >{{ __('Select Gender *') }}</option>
                                    <option @if( optional($university->university)->gender == 'Male') selected @endif value="Male">{{ __('Male') }}</option>
                                    <option @if( optional($university->university)->gender == 'Female') selected @endif value="Female">{{ __('Female') }}</option>
                                    <option @if( optional($university->university)->gender == 'Other') selected @endif value="Other">{{ __('Other') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="admin_email">{{ __('Email') }}<sup class="required">*</sup></label>
                                <input type="email" class="form-control" name="admin_email" value="{{ optional($university->university)->admin_email ?? old('admin_email') }}" placeholder="Ex: johndoe@mail.com" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="admin_mobile">{{ __('Mobile No.') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" name="admin_mobile" value="{{ optional($university->university)->admin_mobile ?? old('admin_mobile') }}" placeholder="Ex: 514-848-2424" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="admin_whatsapp">{{ __('Admin Whatsapp Number') }}</label>
                                <input type="text" class="form-control" name="admin_whatsapp" value="{{ optional($university->university)->admin_whatsapp ?? old('admin_whatsapp') }}" placeholder="{{ __('Ex: +8801712345678') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="admin_telegram">{{ __('Admin Telegram Username') }}</label>
                                <input type="text" class="form-control" name="admin_telegram" value="{{ optional($university->university)->admin_telegram ?? old('admin_telegram') }}" placeholder="{{ __('Ex: admin_name') }}">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="admin_facebook">{{ __('Admin Facebook ID') }}</label>
                                <input type="url" class="form-control" name="admin_facebook" value="{{ optional($university->university)->admin_facebook ?? old('admin_facebook') }}" placeholder="{{ __('Ex: https://facebook.com/adminUserName') }}">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Update University') }}</button>
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
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $(document).ready(function() {
            /* -- Form Select - Select2 -- */
            $('.select2-single').select2();
            // $('.modal').removeAttr('tabindex'); // Working for modal

            var countries = JSON.parse('{!! json_encode($countries) !!}');
            $('#country').change(function(){
                var country_id = $('#country').val();
                var states = [];
                var selected_country = countries.find(country => country.id == country_id);
                if(typeof(selected_country) != 'undefined'){
                    var states = selected_country.states;
                }
                var options = '<option value="" aria-disabled="true">Select Province *</option>';
                states.forEach(state => {
                    options += '<option value="'+state.id+'" >'+state.name+'</option>';
                });
                $('#state').empty().append(options);
            });
            $('#state').change(function(){
                var country_id = $('#country').val();
                var states = [];
                var selected_country = countries.find(country => country.id == country_id);
                if(typeof(selected_country) != 'undefined'){
                    var states = selected_country.states;
                }

                var state_id = $('#state').val();
                var cities = [];
                var selected_state = states.find(state => state.id == state_id);
                if(typeof(selected_state) != 'undefined'){
                    var cities = selected_state.cities;
                }
                var options = '<option value="" aria-disabled="true">Select City *</option>';
                cities.forEach(city => {
                    options += '<option value="'+city.id+'" >'+city.name+'</option>';
                });
                $('#city').empty().append(options);
            });
        });
        function readAvatarURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#avatarPreview').css('background-image', 'url('+e.target.result +')');
                    $('#avatarPreview').hide();
                    $('#avatarPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#avatarUpload").change(function() {
            readAvatarURL(this);
        });

        function readCoverURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#coverPreview').css('background-image', 'url('+e.target.result +')');
                    $('#coverPreview').hide();
                    $('#coverPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#coverUpload").change(function() {
            readCoverURL(this);
        });

        function readAdminURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#adminPreview').css('background-image', 'url('+e.target.result +')');
                    $('#adminPreview').hide();
                    $('#adminPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#adminUpload").change(function() {
            readAdminURL(this);
        });
    </script>
@endsection
