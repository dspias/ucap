<!-- ============================== Start Newsletter ================================== -->
<section class="newsletter theme-bg inverse-theme">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-7 col-md-8 col-sm-12">
                <div class="text-center">
                    <h2>{{ __('Join') }} <span class="text-ucap">{{ __('UCAP Newsletter') }}</span></h2>
                    <p>{{ __('Subscribe our newsletter & get latest news and updates!') }}</p>
                    @error('email')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <form class="sup-form" action="{{ route('guest.newsletter.store') }}" method="POST">
                        @csrf
                        <input type="email" name="email" value="{{ old('email') }}" class="form-control sigmup-me @error('email') is-invalid @enderror" placeholder="{{ __('Your Email Address') }} *" required="required">
                        <input type="submit" class="btn btn-theme text-uppercase text-bold" value="Subscribe">
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ================================= End Newsletter =============================== -->
