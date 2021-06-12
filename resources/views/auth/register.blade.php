@extends('layouts.student.app')

@section('page_title', __('REGISTER'))

@section('css_links')
    {{--  External CSS  --}}
    <link href="{{ asset('assets/css/telephone/intlTelInput.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .iti.iti--allow-dropdown{
        width: 100% !important;
    }
    </style>
@endsection



@section('content')

<!-- Start Content Section -->
<!-- ========================== register Section =============================== -->
<section>
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-7 col-md-9 col-sm-12">
                <div class="log_wrap">
                    <h4>{{ __('Register as a Student') }}</h4>

                    {{-- <div class="social-login light single mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>{{ __('Register with Facebook') }}</a></li>
                            <li><a href="#" class="btn connect-google"><i class="ti-google"></i>{{ __('Register with Google') }}</a></li>
                        </ul>
                    </div>

                    <div class="modal-divider"><span>{{ __('Or') }}</span></div> --}}

                    <div class="login-form">
                        <form method="POST" action="{{ route('register') }}">
                            @csrf

                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" value="{{ old('first_name') }}" name="first_name" autocomplete="off" autofocus class="form-control @error('first_name') is-invalid @enderror" placeholder="{{ __('First Name *') }}" tabindex="0" required>

                                        @error('first_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" value="{{ old('middle_name') }}" name="middle_name" autocomplete="off" autofocus class="form-control @error('middle_name') is-invalid @enderror" placeholder="{{ __('Middle Name') }}" tabindex="0">

                                        @error('middle_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input type="text" value="{{ old('last_name') }}" name="last_name" autocomplete="off" autofocus class="form-control @error('last_name') is-invalid @enderror" placeholder="{{ __('Last Name *') }}" tabindex="0" required>

                                        @error('last_name')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="email" value="{{ old('email') }}" name="email" required autocomplete="off" autofocus tabindex="0" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Email *') }}">

                                        @error('email')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" tabindex="0" required>

                                        @error('phone')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" value="{{ old('password') }}" name="password" required autocomplete="off" tabindex="0" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password *') }}">

                                        @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <input type="password" value="{{ old('password_confirmation') }}" name="password_confirmation" required autocomplete="off" tabindex="0" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="{{ __('Re-Type Password *') }}">

                                        @error('password_confirmation')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>


                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">{{ __('Sign up to apply for a program') }}</button>
                            </div>

                            <div class="text-center">
                                <p class="mt-3">
                                    {{ __('Already Have An Account?') }}
                                    <a href="{{ route('login') }}" class="link"><b>{{ __('Sign in') }}</b></a>
                                </p>
                            </div>

                        </form>
                    </div>
                </div>
            </div>

        </div>

        @include('sweetalert::alert')

    </div>
</section>
<!-- ========================== register Section =============================== -->
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}
    <script src="{{ asset('assets/js/telephone/intlTelInput.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here

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
@endsection
