<!-- ============================ Footer Start ================================== -->
<footer class="light-footer custom-footer-section">
    <div>
        <div class="container">
            {{-- <div class="row justify-content-between"> --}}
            <div class="row">
                <div class="col-md-6 text-center">
                    <div class="footer-widget">
                        {{-- <img src="{{ asset('assets/images/logo.png') }}" class="img-footer" alt="" /> --}}
                        <div class="footer-add">
                            <p>{{ ucap_get('ucap_address') }}</p>
                            <p>{{ ucap_get('support_email_one') }} @if(!is_null( ucap_get('support_email_two') )) | {{ ucap_get('support_email_two') }}@endif</p>
                            <p>{{ ucap_get('support_contact_one') }} @if(!is_null( ucap_get('support_contact_two') )) | {{ ucap_get('support_contact_two') }}@endif</p>
                        </div>
                        <div class="social-links text-center">
                            <ul>
                                <li>
                                    <a href="{{ ucap_get('facebook') }}" target="_blank" class="btn btn-dark bg-ucap btn-sm">
                                        <i class="fa fa-facebook"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ ucap_get('instagram') }}" target="_blank" class="btn btn-dark bg-ucap btn-sm">
                                        <i class="fa fa-instagram"></i>
                                    </a>
                                </li>
                                <li>
                                    <a href="{{ ucap_get('linkedin') }}" target="_blank" class="btn btn-dark bg-ucap btn-sm">
                                        <i class="fa fa-linkedin"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 text-center quick-links">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('guest.about.index') }}">{{ __('About UCAP') }}</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Our Services') }}</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Join Our Team') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('guest.faq.index') }}">{{ __('FAQ') }}</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('guest.contact.index') }}">{{ __('Contact Us') }}</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Privacy Statement') }}</a></li>
                            <li class="breadcrumb-item"><a href="#">{{ __('Terms of Use') }}</a></li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-12 text-center">
                    <p class="mb-0">&copy;<script>document.write(new Date().getFullYear());</script> <span class="text-ucap text-bold">{{ app_name() }}</span>. Developed by <a href="javascript:void(0);" class="text-ucap text-bold" data-toggle="modal" data-target="#developer_modal">PiNikk</a>.</p>
                </div>
            </div>
        </div>
    </div>
</footer>
@include('layouts.developer')
<!-- ============================ Footer End ================================== -->
