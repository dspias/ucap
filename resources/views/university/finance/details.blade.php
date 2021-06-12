@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Payment Details'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Payment Details') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Finance') }}</li>
    <li class="breadcrumb-item">{{ __('Payments') }}</li>
    <li class="breadcrumb-item">
        <a href="{{ route('superadmin.finance.all') }}">{{ __('All Payments') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Payment Details') }}</li>
@endsection


@section('action')
    <a class="btn btn-custom" href="{{ url()->previous() }}">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
@endsection



@section('content')

<!-- Start row -->
<div class="row justify-content-center">
    <!-- Start col -->
    <div class="col-md-12 col-lg-10 col-xl-10">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="invoice">
                    <div class="invoice-head">
                        <div class="row">
                            <div class="col-12 col-md-7 col-lg-7">
                                <div class="invoice-logo">
                                    <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid" alt="invoice-logo">
                                </div>
                                <h4>{{ __('UCAP Ltd.') }}</h4>
                                <p>{{ __('University and College Admission Partner') }}</p>
                                <p class="mb-0">{{ 'Ucap Full Address, Here' }}</p>
                            </div>
                            <div class="col-12 col-md-5 col-lg-5">
                                <div class="invoice-name">
                                    <h3 class="text-uppercase text-bold text-success mb-3">{{ __('Paid') }}</h3>
                                    <h3 class="text-uppercase text-bold mb-3">{{ __('Invoice') }}</h3>
                                    <p class="mb-1">{{ __('No:') }} <span class="text-ucap text-bold">{{ 'UCAPINV00000001' }}</span></p>
                                    
                                    <p class="mb-0 text-bold text-muted border-top pt-2 mt-2">{{ __('Requested At:') }} <span class="text-info">{{ '12-12-2021' }}</span></p>
                                    <p class="mb-0 text-bold text-muted">{{ __('Paid At:') }} <span class="text-success">{{ '12-12-2021' }}</span></p>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="invoice-billing">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="invoice-address">
                                    <h5 class="text-bold mb-3">{{ __('Pay By') }}</h5>
                                    <h6 class="text-ucap">{{ __('UCAP Ltd.') }}</h6>
                                    <ul class="list-unstyled">
                                        <li>{{ 'ucap_address_here' }}</li>  
                                        <li>{{ 'ucap_mobile_here' }}</li>
                                        <li>{{ 'ucap_email_here' }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="invoice-address">
                                    <h5 class="text-bold mb-3">{{ __('Pay By') }}</h5>
                                    <h6 class="text-ucap">{{ __('User_Name_Here') }}</h6>
                                    <ul class="list-unstyled">
                                        <li>{{ 'user_address_here' }}</li>  
                                        <li>{{ 'user_mobile_here' }}</li>
                                        <li>{{ 'user_email_here' }}</li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="invoice-address">
                                    <div class="card">
                                        <div class="card-body bg-info-rgba text-center">
                                            <h6>{{ __('Payment Method') }}</h6>
                                            <p><i class="fa fa-cc-stripe text-info font-40"></i></p>
                                            <p class="text-bold">{{ __('via Stripe') }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                    <div class="invoice-summary">
                        <div class="table-responsive ">
                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col" class="text-center text-bold font-20">{{ __('Requested Amount') }}</th>                       
                                        <th scope="col" class="text-center text-bold font-20">{{ __('Payable Amount') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row" class="text-center text-bold text-ucap font-26">100</th>
                                        <th scope="row" class="text-center text-bold text-ucap font-26">100</th>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                    <div class="invoice-meta">
                        <div class="row">
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="invoice-meta-box">
                                    <h6 class="mb-3">Terms &amp; Conditions</h6>
                                    <ul class="pl-3">
                                        <li>Goods once sold will not be taken back.</li>  
                                        <li>We are responsible for Courier Damage.</li>  
                                        <li>Subjects to NY Jurisdiction.</li>  
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-6 col-md-4 col-lg-4">
                                <div class="invoice-meta-box">
                                    <h6 class="mb-3">Contact Us</h6>
                                    <ul class="list-unstyled">
                                        <li><i class="feather icon-aperture mr-2"></i>www.example.com</li>  
                                        <li><i class="feather icon-mail mr-2"></i>demo@example.com</li>  
                                        <li><i class="feather icon-phone mr-2"></i>+1-9876543210</li>  
                                    </ul>
                                </div>
                            </div>
                            <div class="col-sm-12 col-md-4 col-lg-4">
                                <div class="invoice-meta-box text-right">
                                    <h6 class="mb-0">{{ __('Authorized Company') }}</h6>
                                    <img src="{{ asset('assets/images/logo.png') }}" class="img-fluid my-3" alt="LOGO" width="120">
                                    <h5 class="text-bold text-success text-uppercase">{{ __('PAID') }}</h5>
                                </div>
                            </div>
                        </div>
                    </div> 
                    <div class="invoice-footer">
                        <div class="row align-items-center">
                            <div class="col-md-6">
                                <p class="mb-0">{{ __('Thank you for being with UCAP') }}</p>
                            </div>
                            <div class="col-md-6">
                                <div class="invoice-footer-btn">
                                    <a href="javascript:window.print()" class="btn btn-dark py-1 font-16"><i class="feather icon-printer mr-2"></i>{{ __('Print') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>                                   
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->

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
