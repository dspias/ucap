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
                    <h4>{{ __('Send Password Reset Link') }}</h4>
                            
                    <div class="login-form">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <div class="form-group">
                                <input type="email" value="{{ old('email') }}" name="email" autocomplete="off" autofocus class="form-control @error('email') is-invalid @enderror" placeholder="{{ __('Registered Email') }}" tabindex="0" required>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            
                            <div class="social-login mb-3">
                                <ul>
                                    <li class="right"><a href="{{ route('login') }}" class="theme-cl">{{ __('Remember Password?') }}</a></li>
                                </ul>
                            </div>
                            
                            <div class="form-group">
                                <button type="submit" class="btn btn-md full-width pop-login">{{ __('Send Reset Link') }}</button>
                            </div>
                        
                        </form>
                    </div>
                </div>
            </div>

        </div>
        
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
