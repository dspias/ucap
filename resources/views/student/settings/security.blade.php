@extends('student.layouts.student')

@section('page_title', __('SETTINGS | Edit Credentials'))

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
    </style>
@endsection

@section('student_content')

<!-- Start Content Section -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard_container">
            <div class="dashboard_container_header bg-dark">
                <div class="dashboard_fl_1">
                    <h4 class="text-white">{{ __('Update Credentials of '. auth()->user()->name) }}</h4>
                </div>
            </div>
            <div class="dashboard_container_body p-4">
                <form action="{{ route('student.settings.change_password') }}" method="POST">
                    @csrf
                    <!-- Social Account info -->
                    <div class="form-submit">
                        <h4 class="pl-2 mt-0 mb-3">{{ __('Update Password') }}</h4>
                        <div class="submit-section">
                            <div class="form-row">

                                <div class="form-group col-12">
                                    <label>{{ __('Old Password') }}<sup class="text-ucap">*</sup></label>
                                    <input type="password" minlength="8" min="8" name="old_password" class="form-control @error('old_password') is-invalid @enderror" placeholder="{{ __('Old Password *') }}" required>

                                    @error('old_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label>{{ __('New Password') }}<sup class="text-ucap">*</sup></label>
                                    <input type="password" minlength="8" min="8" name="new_password" class="form-control @error('new_password') is-invalid @enderror" placeholder="{{ __('New Password *') }}" required>

                                    @error('new_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-12">
                                    <label>{{ __('Confirm New Password') }}<sup class="text-ucap">*</sup></label>
                                    <input type="password" minlength="8" min="8" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" placeholder="{{ __('Confirm New Password *') }}" required>

                                    @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>

                                <div class="form-group col-lg-12 col-md-12">
                                    <button class="btn btn-theme btn-block mt-3" type="submit">{{ __('Update Password') }}</button>
                                </div>

                            </div>
                        </div>
                    </div>
                    <!-- / Social Account info -->
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
    <script src="//geodata.solutions/includes/countrystatecity.js"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
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
@endsection
