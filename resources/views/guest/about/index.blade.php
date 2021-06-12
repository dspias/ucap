@extends('layouts.student.app')

@section('page_title', __('About US'))

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
<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">

                <div class="breadcrumbs-wrap">
                    <h1>{{ __('Who We are') }}</h1>
                    <p class="text-muted">{{ __('Know about UCAP') }}</p>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->

<!-- ========================== About Facts List Section =============================== -->
<section class="pt-0">
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="list_facts_wrap">
                    <div class="sec-heading mb-3">
                        <h2>{{ __('Know about') }} <span class="theme-cl">{{ __('UCAP') }}</span></h2>
                    </div>

                    <p>{!! ucap_get('about_ucap') !!}</p>

                </div>
                {{-- <a href="#" class="btn btn-modern">Know More<span><i class="ti-arrow-right"></i></span></a> --}}
            </div>
            @php
                $about_photo = ucap_get('about_photo');
                $about_photo = (!is_null($about_photo)) ? url($about_photo) : 'https://via.placeholder.com/550x490';
            @endphp

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="list_facts_wrap_img">
                    <img src="{{ $about_photo }}" class="img-fluid" alt="" />
                </div>
            </div>

        </div>

    </div>
</section>
<!-- ========================== About Facts List Section =============================== -->
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
