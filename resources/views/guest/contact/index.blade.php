@extends('layouts.student.app')

@section('page_title', __('Contact'))

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
<!-- ============================ Agency List Start ================================== -->
<section class="bg-light">

    <div class="container">

        <!-- row Start -->
        <div class="row">

            <div class="col-lg-8 col-md-7">
                <div class="prc_wrap">

                    <div class="prc_wrap_header">
                        <h4 class="property_block_title">{{ __('Send Your Message') }}</h4>
                    </div>

                    <form action="{{ route('guest.contact.sendmail') }}" method="post">
                        @csrf
                        <div class="prc_wrap-body">
                            <div class="form-group">
                                <div class="form-group">
                                    <label>{{ __('Subject') }} <sup class="text-ucap">*</sup></label>
                                    <input type="text" name="subject" value="{{ old('subject') }}" class="form-control simple" placeholder="{{ __('Ex: Want to know about UCAP') }}" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="form-group">
                                    <label>{{ __('Full Name') }} <sup class="text-ucap">*</sup></label>
                                    <input type="text" name="name" value="{{ old('name') }}" class="form-control simple" placeholder="{{ __('Ex: John Doe') }}" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('Valid Email') }} <sup class="text-ucap">*</sup></label>
                                        <input type="email" name="email" value="{{ old('email') }}" class="form-control simple" placeholder="{{ __('Ex: johndoe@mail.com') }}" required>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('Contact Number') }} <sup class="text-ucap">*</sup></label>
                                        <input type="text" name="number" value="{{ old('number') }}" class="form-control simple" placeholder="{{ __('Ex: +880 1712 345678') }}" required>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>{{ __('Your Message') }} <sup class="text-ucap">*</sup></label>
                                <textarea name="message" rows="3" class="form-control simple" placeholder="{{ __('Ex: Please let me know about UCAP.') }}" required>{{ old('message') }}</textarea>
                            </div>
                            <div class="form-group">
                                {!! NoCaptcha::display() !!}
                            </div>

                            <div class="form-group">
                                <button class="btn btn-theme" type="submit">{{ __('Send Message') }}</button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

            <div class="col-lg-4 col-md-5">

                <div class="prc_wrap">

                    <div class="prc_wrap_header">
                        <h4 class="property_block_title">{{ __('Leave us a message') }}</h4>
                    </div>

                    <div class="prc_wrap-body">
                        <div class="contact-info">
                            {{-- <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-mobile"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">{{ __('Call Us') }}</h4>
                                    {{ ucap_get('support_contact_one') }}@if(!is_null( ucap_get('support_contact_two') )) <br> {{ ucap_get('support_contact_two') }}@endif
                                </div>
                            </div> --}}

                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="ti-email"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">{{ __('Email Us') }}</h4>
                                    {{ ucap_get('support_email_one') }}@if(!is_null( ucap_get('support_email_two') )) <br> {{ ucap_get('support_email_two') }}@endif
                                </div>
                            </div>

                            <div class="cn-info-detail">
                                <div class="cn-info-icon">
                                    <i class="fa fa-whatsapp"></i>
                                </div>
                                <div class="cn-info-content">
                                    <h4 class="cn-info-title">{{ __('Whatsapp Us') }}</h4>
                                    {{ ucap_get('whatsapp_no_one') }}@if(!is_null( ucap_get('whatsapp_no_two') )) <br> {{ ucap_get('whatsapp_no_two') }}@endif
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

        </div>
        <!-- /row -->

    </div>

</section>
<!-- ============================ Agency List End ================================== -->
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}
    {!! NoCaptcha::renderJs() !!}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
