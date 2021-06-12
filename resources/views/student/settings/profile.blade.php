@extends('student.layouts.student')

@section('page_title', __('SETTINGS | Edit Profile'))

@section('css_links')
    {{--  External CSS  --}}
    <link href="{{ asset('assets/css/telephone/intlTelInput.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .iti{
        display: block !important;
    }
    .dashboard_container.no-shadow{
        border: 1px solid #f7f7f7;
        border-radius: 0px;
    }
    .dashboard_container.no-shadow .dashboard_container_body{
        padding: 20px;
    }
    </style>
@endsection

@section('student_content')

<!-- Start Content Section -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard_container">
            <div class="dashboard_container_header bg-dark">
                <div class="dashboard_fl_1">
                    <h4 class="text-white">{{ __('Update Profile of '. $user->name) }}</h4>
                </div>
            </div>
            <div class="dashboard_container_body p-4">
                <form action="{{ route('student.settings.profile.update') }}" method="post">
                    @csrf
                    <!-- Basic info -->
                    <div class="submit-section">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12">
                                        <h4 class="pl-2 mt-0 mb-0">{{ __('Basic Informations') }}</h4>
                                    </div>
                                </div>
                                <hr>
                                <div class="form-row">

                                    <div class="form-group col-md-4">
                                        <label>{{ __('First Name') }}<sup class="text-ucap">*</sup></label>
                                        <input type="text" name="first_name" class="form-control @error('first_name') is-invalid @enderror" value="{{ optional($user->student)->first_name ?? old('first_name') }}" placeholder="{{ __('First Name *') }}" required>

                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>{{ __('Middle Name') }}</label>
                                        <input type="text" name="middle_name" class="form-control @error('middle_name') is-invalid @enderror" value="{{ optional($user->student)->middle_name ?? old('middle_name') }}" placeholder="{{ __('Middle Name') }}">

                                        @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>{{ __('Last Name') }}<sup class="text-ucap">*</sup></label>
                                        <input type="text" name="last_name" class="form-control @error('last_name') is-invalid @enderror" value="{{ optional($user->student)->last_name ?? old('last_name') }}" placeholder="{{ __('Last Name *') }}" required>

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>{{ __('Select Gender') }}<sup class="text-ucap">*</sup></label>
                                        @php
                                            $gender = optional($user->student)->gender;
                                        @endphp
                                        <select class="select2-single form-control @error('gender') is-invalid @enderror" name="gender" id="gender" required style="height: 54px;">
                                            <option value="" aria-disabled="true">Select Gender *</option>
                                            <option value="Male" @if( !is_null($gender) && $gender == 'Male')selected @endif>Male</option>
                                            <option value="Female" @if( !is_null($gender) && $gender == 'Female')selected @endif>Female</option>
                                            <option value="Other" @if( !is_null($gender) && $gender == 'Other')selected @endif>Other</option>
                                        </select>

                                        @error('gender')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        @php
                                            $day = $month =  $year = null;
                                            $dob = optional($user->student)->dob;
                                            if(!is_null($dob)){
                                                $date = new DateTime($dob);
                                                $year = $date->format('Y');
                                                $month = $date->format('m');
                                                $day = $date->format('d');
                                            }
                                        @endphp
                                        <label>{{ __('Date Of Birth') }}<sup class="text-ucap">*</sup></label>
                                        <div class="input-group border-0">
                                            <input type="number" name="day" min="1" max="31" class="form-control @error('day') is-invalid @enderror" value="{{ $day ?? old('day') }}" placeholder="dd" required>
                                            <input type="number" name="month" min="1" max="12" class="form-control @error('month') is-invalid @enderror" value="{{ $month ?? old('month') }}" placeholder="mm" required>
                                            <input type="number" name="year" min="1990" class="form-control @error('year') is-invalid @enderror" value="{{ $year ?? old('year') }}" placeholder="yyyy" required>
                                        </div>
                                        {{-- <input type="date" name="birthdate" class="form-control @error('birthdate') is-invalid @enderror" value="{{ __('student_birthdate_here') }}" placeholder="{{ __('Date Of Birth *') }}" required> --}}
                                        @error('day')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @error('month')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                        @error('year')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>{{ __('Native Language') }}<sup class="text-ucap">*</sup></label>
                                        <select class="select2-single form-control @error('language') is-invalid @enderror" name="language" id="language" required >
                                            <option value="" aria-disabled="true" >{{ __('Select language *') }}</option>
                                            @include('student.settings.apart.languages')
                                        </select>
                                        @error('language')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-6">
                                        <label>{{ __('Email ID') }}<sup class="text-ucap">*</sup></label>
                                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" value="{{ $user->email ?? old('email') }}" placeholder="{{ __('Email ID *') }}" required disabled>

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>{{ __('Mobile Number') }}<sup class="text-ucap">*</sup></label>
                                        <input type="tel" name="phone" id="phone" class="form-control @error('phone') is-invalid @enderror" value="{{ optional($user->student)->phone ?? old('phone') }}" required>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>{{ __('Country') }}<sup class="text-ucap">*</sup></label>
                                        <select name="country" class="countries form-control @error('country') is-invalid @enderror presel-{{ optional($user->student)->country }}" id="countryId" required>
                                            <option value="" aria-disabled="true" >{{ __('Select Country *') }}</option>
                                            {{-- @if(!is_null(optional($user->student)->country))
                                            <option value="{{ optional($user->student)->country }}">{{ optional($user->student)->country }}</option>
                                            @endif --}}
                                        </select>

                                        @error('country')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>{{ __('Province') }}<sup class="text-ucap">*</sup></label>
                                        <select name="state" class="states form-control @error('state') is-invalid @enderror presel-{{ optional($user->student)->state }}" id="stateId" required >
                                            <option value="" aria-disabled="true" >{{ __('Select State *') }}</option>
                                        </select>
                                        @error('state')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-4">
                                        <label>{{ __('City') }}<sup class="text-ucap">*</sup></label>
                                        <select name="city" class="cities form-control @error('city') is-invalid @enderror presel-{{ optional($user->student)->city }}" id="cityId" required >
                                            <option value="" aria-disabled="true" >{{ __('Select Country *') }}</option>
                                        </select>
                                        @error('city')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="form-group col-md-12">
                                        <label>{{ __('Address') }}<sup class="text-ucap">*</sup></label>
                                        <textarea  name="address" class="form-control @error('address') is-invalid @enderror" placeholder="{{ __('address *') }}" required>{{ optional($user->student)->address ?? old('address') }}</textarea>

                                        @error('address')
                                            <div class="alert alert-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group col-lg-12 col-md-12">
                            <button class="btn btn-theme btn-block mt-3" type="submit">{{ __('Update Profile Information') }}</button>
                        </div>
                    </div>
                    <!-- Basic info -->
                </form>
            </div>
        </div>
    </div>
</div>
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}

    <script src="{{ asset('assets/js/telephone/intlTelInput.js') }}"></script>

    {{-- Country State City API --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/country.state.city.js') }}"></script>
    {{-- <script src="//geodata.solutions/includes/countrystatecity.js"></script> --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        var string = '{!! optional($user)->student !!}';
        var student = '';
        if(string != '') student = JSON.parse(string);
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

        //language
        var lang = null;
        if(student != "" || typeof(student) != 'undefined'){
            lang  = student.language;
            if(lang != null){
                $('#language option').each(function(){
                    if($(this).val()==lang){ // EDITED THIS LINE
                        $(this).attr("selected","selected");
                    }
                });
            }
        }
    </script>
@endsection
