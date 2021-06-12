@extends('layouts.representative.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Profile | Edit'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Datepicker css -->
    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        .avatar-upload {
            position: relative;
            max-width: 205px;
            margin: 50px auto;
        }
        .avatar-upload .avatar-edit {
            position: absolute;
            right: 12px;
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
            border-radius: 100%;
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
            top: 10px;
            left: 0;
            right: 0;
            text-align: center;
            margin: auto;
        }
        .avatar-upload .avatar-preview {
            width: 192px;
            height: 192px;
            position: relative;
            border-radius: 100%;
            border: 6px solid #f8f8f8;
            box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
        }
        .avatar-upload .avatar-preview > div {
            width: 100%;
            height: 100%;
            border-radius: 100%;
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
    <b class="text-uppercase">{{ __('Edit Profile') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Settings') }}</li>
    <li class="breadcrumb-item">
        <a href="{{ route('representative.settings.profile.index') }}">{{ __('Profile') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Edit Profile') }}</li>
@endsection


@section('action')
    <button class="btn btn-custom" onClick="window.location.reload();">
        <i class="feather icon-refresh-cw mr-1"></i>
        {{ __('Refresh') }}
    </button>
@endsection



@section('content')

<!-- Start row -->
<div class="row m-b-30">
    <!-- Start col -->
    <div class="col-md-12">
        <div class="card m-b-30">
            <form action="{{ route('representative.settings.profile.update') }}" method="post" enctype="multipart/form-data">
                @csrf
                {{-- <div class="card-header border bottom">
                    <h5 class="mb-0">{{ __('Create New Student') }}</h5>
                </div> --}}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="avatar-upload">
                                <div class="avatar-edit">
                                    <input type='file' name="avatar" id="imageUpload" class="@error('avatar') is-invalid @enderror" accept=".jpg, .jpeg" />
                                    <label for="imageUpload"></label>
                                </div>
                                <div class="avatar-preview">
                                    {{-- <div id="imagePreview" class="@error('avatar') is-invalid @enderror" style="background-image: url(http://i.pravatar.cc/500?img=7);"> --}}

                                    @if(!is_null($url = has_media($representative->representative, 'avatar', 'thumb')))
                                        <div id="imagePreview" class="@error('avatar') is-invalid @enderror" style="background-image: url({{ show_image($url) }});">
                                        </div>
                                    @else
                                        <div id="imagePreview" class="@error('avatar') is-invalid @enderror" style="background-image: url(https://via.placeholder.com/500x500?text=Upload+Avatar);">
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="first_name">{{ __('First Name') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control @error('first_name') is-invalid @enderror" value="{{ optional($representative->representative)->first_name }}" name="first_name" placeholder="Ex: John"  required>
                                @error('first_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="middle_name">{{ __('Middle Name') }}</label>
                                <input type="text" class="form-control @error('middle_name') is-invalid @enderror"  value="{{ optional($representative->representative)->middle_name }}" name="middle_name" placeholder="Ex: Kevin">
                                @error('middle_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="last_name">{{ __('Last Name') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control @error('last_name') is-invalid @enderror"  value="{{ optional($representative->representative)->last_name }}" name="last_name" placeholder="Ex: Doe" required>
                                @error('last_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dob">{{ __('Date Of Birth') }}<sup class="required">*</sup></label>
                                <input type="text" name="dob" id="autoclose-date" class="datepicker-here form-control @error('dob') is-invalid @enderror" placeholder="yyyy-mm-dd" aria-describedby="basic-addon2"/>
                                @error('dob')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="gender">{{ __('Gender') }}<sup class="required">*</sup></label>
                                <select class="select2-single form-control @error('gender') is-invalid @enderror"  value="{{ optional($representative->representative)->first_name }}" name="gender" id="gender" required >
                                    <option value="" aria-disabled="true" >{{ __('Select Gender *') }}</option>
                                    <option @if( optional($representative->representative)->gender == 'Male') selected @endif value="Male">{{ __('Male') }}</option>
                                    <option @if( optional($representative->representative)->gender == 'Female') selected @endif value="Female">{{ __('Female') }}</option>
                                    <option @if( optional($representative->representative)->gender == 'Other') selected @endif value="Other">{{ __('Other') }}</option>
                                </select>
                                @error('gender')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="language">{{ __('Native Language.') }}<sup class="required">*</sup></label>
                                <select class="select2-single form-control @error('language') is-invalid @enderror" name="language" id="language" required >
                                    <option value="" aria-disabled="true" >{{ __('Select language *') }}</option>
                                    @include('representative.settings.profile.apart.languages')
                                </select>
                                @error('language')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="phone">{{ __('Mobile No.') }}<sup class="required">*</sup></label>
                                <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone"  value="{{ optional($representative->representative)->phone }}" name="phone" required>
                                @error('phone')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="country">{{ __('Country') }}<sup class="required">*</sup></label>
                                <select name="country" class="countries form-control @error('country') is-invalid @enderror presel-{{ optional($representative->representative)->country }}" id="countryId" required >
                                    <option value="" aria-disabled="true" >{{ __('Select Country *') }}</option>
                                </select>
                                @error('country')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="state">{{ __('Province') }}<sup class="required">*</sup></label>
                                <select name="state" class="states form-control @error('state') is-invalid @enderror  presel-{{ optional($representative->representative)->state }}" id="stateId" required >
                                    <option value="" aria-disabled="true" >{{ __('Select State *') }}</option>
                                </select>
                                @error('state')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="city">{{ __('City') }}<sup class="required">*</sup></label>
                                <select name="city" class="cities form-control @error('city') is-invalid @enderror  presel-{{ optional($representative->representative)->city }}" id="cityId" required >
                                    <option value="" aria-disabled="true" >{{ __('Select City *') }}</option>
                                </select>
                                @error('city')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="address">{{ __('Address') }}<sup class="required">*</sup></label>
                                <textarea class="form-control @error('address') is-invalid @enderror" name="address" id="address" rows="3" placeholder="Address" required>{{ optional($representative->representative)->address }}</textarea>
                                @error('address')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Update Profile') }}</button>
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
    <!-- Datepicker JS -->
    <script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-datepicker.js') }}"></script>

    {{-- Country State City API --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> --}}
    <script src="{{ asset('assets/js/country.state.city.js') }}"></script>
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        /* -- Form Select - Select2 -- */
        $('.select2-single').select2();

        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#imagePreview').css('background-image', 'url('+e.target.result +')');
                    $('#imagePreview').hide();
                    $('#imagePreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imageUpload").change(function() {
            readURL(this);
        });
    </script>

    <script>
        var input = document.querySelector("#phone");
        window.intlTelInput(input, {
        // allowDropdown: false,
        // autoHideDialCode: false,
        // autoPlaceholder: "off",
        // dropdownContainer: document.body,
        // excludeCountries: ["us"],
        // formatOnDisplay: false,
        // geoIpLookup: function(callback) {
        //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        //     var countryCode = (resp && resp.country) ? resp.country : "";
        //     callback(countryCode);
        //   });
        // },
        // hiddenInput: "full_number",
        // initialCountry: "auto",
        // localizedCountries: { 'de': 'Deutschland' },
        // nationalMode: false,
        // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // placeholderNumberType: "MOBILE",
        // preferredCountries: ['cn', 'jp'],
        // separateDialCode: true,
        utilsScript: "{{ asset('assets/js/telephone/utils.js') }}",
        });
    </script>
    <script>
        $(document).ready(function(){
            var language = '{{ optional($representative->representative)->language }}';
            if(language != "" && typeof(language) != 'undefined'){
                $('#language option').each(function(){
                    if($(this).val()==language){ // EDITED THIS LINE
                        $(this).attr("selected","selected");
                        $('#select2-language-container').html($(this).html());
                    }
                });
            }

            let dob = '{{ optional($representative->representative)->dob }}';
            if(dob != "" && typeof(dob) != 'undefined'){
                $('#autoclose-date').datepicker().data('datepicker').selectDate(new Date(dob));
            }
        });
    </script>
@endsection
