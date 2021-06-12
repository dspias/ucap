@extends('layouts.student.app')

@section('page_title', __('LOGIN'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection



@section('content')

<!-- Start Content Section -->
<!-- ========================== Login Section =============================== -->
<section>
    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-6 col-md-9 col-sm-12">
                <div class="log_wrap">
                    <h4>{{ __('Sign In') }}</h4>

                    {{-- <div class="social-login light single mb-3">
                        <ul>
                            <li><a href="#" class="btn connect-fb"><i class="ti-facebook"></i>{{ __('Login with Facebook') }}</a></li>
                            <li><a href="#" class="btn connect-google"><i class="ti-google"></i>{{ __('Login with Google') }}</a></li>
                        </ul>
                    </div>

                    <div class="modal-divider"><span>{{ __('Or') }}</span></div> --}}

                    <div class="login-form">
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group">
                                <input type="email" value="{{ old('email') }}" name="email" required autocomplete="off" autofocus tabindex="0" class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Login Email') }}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <input type="password" value="{{ old('password') }}" name="password" required autocomplete="off"  tabindex="0" class="form-control @error('password') is-invalid @enderror" placeholder="{{ __('Password') }}">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>


                            <div class="social-login mb-3">
                                <ul>
                                    <li>
                                        <input id="reg" class="checkbox-custom" name="reg" type="checkbox">
                                        <label for="reg" class="checkbox-custom-label">{{ __('Remember Me') }}</label>
                                    </li>
                                    <li class="right"><a href="{{ route('password.request') }}" class="theme-cl">{{ __('Forgot Password?') }}</a></li>
                                </ul>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">{{ __('Submit') }}</button>
                            </div>

                            <div class="text-center">
                                <p class="mt-3">
                                    {{ __('Don\'t have any account?') }}
                                    <a href="{{ route('register') }}" class="link"><b>{{ __('Sign up') }}</b></a>
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
<!-- ========================== Login Section =============================== -->
<!-- End Content Section -->

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
