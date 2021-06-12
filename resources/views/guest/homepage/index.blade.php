@extends('layouts.student.app')

@section('page_title', __('Homepage'))

@section('css_links')
    {{--  External CSS  --}}
    {{-- <link href="{{ asset('frontend/assets/css/nice-select.min.css') }}" rel="stylesheet" /> --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .big-header-capt{
        font-size: 40px;
    }
    .card.no-shadow,
    .card.no-shadow .card-body{
        background-color: transparent !important;
        padding-left: 0px;
    }
    
    .input-group,
    .form-control,
    .banner-search span.select2-selection.select2-selection--single{
        border: 0px solid #ffffff;
        border-radius: 0px !important;
    }
    .form-control[name="title"]{
        border-right: 1px solid #d6d6d6 !important;
    }
    .banner-search{
        background-color: transparent;
        background: transparent;
    }
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #f40808;
        color: white;
    }
    .btn-custom.btn-search{
        border-radius: 0px;
    }

    /* // Extra small devices (portrait phones, less than 576px) */
    @media (min-width: 300px) and (max-width: 575.98px) {
        .form-control[name="title"]{
            width: auto;
            border-right: 0px solid #d6d6d6 !important;
            border-bottom: 1px solid #d6d6d6 !important;
            border-bottom-left-radius: 0px !important;
        }
        .select2-container{
            width: 100% !important;
        }
        .input-group-append{
            width: 100% !important;
            margin-left: 0px !important;
        }
        .btn-custom.btn-search{
            width: 100% !important;
        }
    }

    /* // Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) and (max-width: 767.98px) {
        .form-control[name="title"]{
            width: auto;
            border-right: 0px solid #f40808 !important;
            border-bottom: 1px solid #f40808 !important;
            border-bottom-left-radius: 0px !important;
        }
        .select2-container{
            width: 100% !important;
        }
        .input-group-append{
            width: 100% !important;
            margin-left: 0px !important;
        }
        .btn-custom.btn-search{
            width: 100% !important;
        }
    }

    /* // Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .form-control[name="title"]{
            width: auto;
        }
    }

    /* // Large devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1199.98px) {

    }

    /* // Extra large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {

    }
    </style>
@endsection



@section('content')
@php
    $cover_photo = ucap_get('cover_photo');
    $cover_photo = (!is_null($cover_photo)) ? url($cover_photo) : 'https://via.placeholder.com/1920x650';

    $about_photo = ucap_get('about_photo');
    $about_photo = (!is_null($about_photo)) ? url($about_photo) : 'https://via.placeholder.com/550x490';

@endphp

<!-- Start Content Section -->
<!-- ============================ Hero Banner  Start================================== -->
<div class="image-cover hero_banner hero-inner-2 shadow rlt" style="background:url({{ $cover_photo }}) no-repeat;" data-overlay="7">
    <div class="container">

        <div class="hero-caption small_wd mb-5">
            <h3 class="big-header-capt cl_2 mb-0">{{ ucap_get('cover_heading') }}</h3>
            <p>{{ ucap_get('moto_ucap') }}</p>
        </div>
        <!-- Type -->
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12">
                <div class="banner-search">
                    <form action="{{ route('guest.program.index') }}" method="get">
                        <div class="search_hero_wrapping">
                            <div class="row">
                                <div class="col-12">
                                    <div class="card no-shadow mb-0">
                                        <div class="card-body search-options">
                                        
                                            <div class="input-group">
                                                <input type="text" class="form-control" name="title" placeholder="{{ __('Program Name') }}">

                                                <select name="degree[]" id="program_level" class="form-control">
                                                    <option value="" aria-disabled="">{{ __('Select Level') }}</option>
                                                    <option value="{{ 'diploma' }}">{{ 'Diploma' }}</option>
                                                    <option value="{{ 'graduation' }}">{{ 'Graduation' }}</option>
                                                    <option value="{{ 'post graduation' }}">{{ 'Post Graduation' }}</option>
                                                    <option value="{{ 'phd' }}">{{ 'Phd' }}</option>
                                                </select>

                                                <div class="input-group-append">
                                                    <button class="btn btn-custom bg-ucap text-bold text-uppercase btn-search" type="submit">
                                                        <i class="ti-search"></i>
                                                        {{ __('Search') }}
                                                    </button>
                                                </div>
                                            </div>
                                                
                                            <a href="{{ route('guest.search.index') }}" class="text-white text-capitalize text-bold float-right mt-1">{{ __('Advance Search') }}</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Hero Banner End ================================== -->


<!-- ============================ Trips Facts Start ================================== -->
{{-- <div class="trips_wrap full">
    <div class="container">
        <div class="row m-0">
            @foreach($faculties as $faculty)
            <div class="col-md-4">
                <div class="trips">
                    <div class="trips_icons">
                        <a href="{{ route('guest.university.show', ['id' => decbin(optional($faculty->university)->id), 'name' => get_name(optional($faculty->university)->name)]) }}" data-toggle="tooltip" data-title="{{ __('View University') }}">
                            @if(!is_null($url = has_media(optional($faculty->university)->university, 'logo', 'thumb')))
                            <img src="{{ show_image($url) }}" class="uni-logo" alt="LOGO" style="width: 60px; height: 60px; border-radius: 100%;">
                            @else
                            <img src="https://via.placeholder.com/500x500" class="uni-logo" alt="LOGO" style="width: 60px; height: 60px; border-radius: 100%;">
                            @endif
                        </a>
                    </div>
                    <div class="trips_detail">
                        <h4>
                            <a href="{{ route('guest.faculty.show', ['faculty_id' => decbin($faculty->id), 'faculty_name' => get_name($faculty->name)]) }}" class="text-ucap" data-toggle="tooltip" data-title="{{ __('View Faculty') }}">{{ $faculty->name }}</a>
                        </h4>
                        <p class="text-bold">{{ __('Active Programs: ') }} {{ $faculty->programs()->whereStatus(true)->count() }}+</p>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
    </div>
</div> --}}
<!-- ============================ Trips Facts Start ================================== -->



<!-- ========================== About Facts List Section =============================== -->
<section>
    <div class="container">

        <div class="row align-items-center">

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="about-short">
                    <div class="sec-heading mb-3">
                        <h2>{{ __('About') }} <span class="theme-cl">{{ __('UCAP') }}</span></h2>
                    </div>
                    <p>{!! show_char(ucap_get('about_ucap'), 470) !!}</p>
                    {{-- <div class="cource_facts">
                        <ul>
                            <li><span class="theme-cl">{{ $active['university'] }}+</span>{{ __('Active Universities') }}</li>
                            <li><span class="theme-cl">{{ $active['program'] }}+</span>{{ __('Active Programs') }}</li>
                            <li><span class="theme-cl">{{ $active['apply'] }}+</span>{{ __('Student Applies') }}</li>
                        </ul>
                    </div> --}}
                    <a href="{{ route('guest.about.index') }}" class="btn btn-modern">Know More<span><i class="ti-arrow-right"></i></span></a>
                </div>
            </div>

            <div class="col-lg-6 col-md-6 col-sm-12">
                <div class="list_facts_wrap_img">

                    <img src="{{ $about_photo }}" class="img-fluid" alt="">

                </div>
            </div>

        </div>

    </div>
</section>
<!-- ========================== About Facts List Section =============================== -->


<!-- ============================ Popular Universities Start ================================== -->
<section class="gray">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>{{ __('UCAP Registered Universities') }}</p>
                    <h2>
                        {{ __('Top & Famous') }}
                        <span class="theme-cl">{{ __('Universities') }}</span>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12">
                <div class="four_slide-dots articles arrow_middle">

                    {{-- Single Slide Start --}}
                    @foreach ($universities as $university)
                    <div class="singles_items">
                        <div class="instructor_wrap">
                            <div class="instructor_thumb">
                                <a href="{{ route('guest.university.show', ['id' => decbin($university->id), 'name' => get_name($university->name)]) }}">
                                    @if(!is_null($url = has_media($university->university, 'logo', 'thumb')))
                                    <img src="{{ show_image($url) }}" class="img-fluid" alt="">
                                    @else
                                    <img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
                                    @endif
                                </a>
                            </div>
                            <div class="instructor_caption">
                                <h4><a href="{{ route('guest.university.show', ['id' => decbin($university->id), 'name' => get_name($university->name)]) }}">{{ $university->name }}</a></h4>
                                {{-- <span>Web Designer</span> --}}
                                <ul>
                                    @if(!is_null(optional($university->university)->facebook))
                                    <li><a href="{{ optional($university->university)->facebook }}" target="_blank"><i class="ti-facebook"></i></a></li>
                                    @endif
                                    @if(!is_null(optional($university->university)->instagram))
                                    <li><a href="{{ optional($university->university)->instagram }}" target="_blank"><i class="ti-instagram"></i></a></li>
                                    @endif
                                    @if(!is_null(optional($university->university)->linkedin))
                                    <li><a href="{{ optional($university->university)->linkedin }}" target="_blank"><i class="ti-linkedin"></i></a></li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    {{-- Single Slide End --}}
                </div>
            </div>
        </div>

    </div>
</section>
<!-- ============================ Popular Universities End ================================== -->



<!-- ========================== Popular Programs Section =============================== -->
<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>{{ __('Popular Programs') }}</p>
                    <h2><span class="theme-cl">{{ __('Hot & Popular') }}</span> {{ __('Programs') }}</h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach($programs as $program)
            <div class="col-md-4">
                <div class="edu_cat_2 cat-{{ rand(1,10) }}">
                    <div class="edu_cat_icons">
                        <a class="pic-main" href="{{ route('guest.program.show', ['program_id' => decbin($program->id), 'program_title' => get_name($program->name)]) }}">
                            <h3 class="mb-0">{{ $program->short_name }}</h3>
                        </a>
                    </div>
                    <div class="edu_cat_data">
                        <h4 class="title"><a href="{{ route('guest.program.show', ['program_id' => decbin($program->id), 'program_title' => get_name($program->name)]) }}">{{ $program->name }}</a></h4>
                        <ul class="meta">
                            <li class="video"><i class="fa fa-university"></i>{{ optional(optional($program->faculty)->university)->name }}</li>
                        </ul>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

    </div>
</section>
<!-- ========================== Popular Programs Section =============================== -->
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}
    {{-- <script src="{{ asset('frontend/assets/js/nice-select.min.js') }}"></script> --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        // $(document).ready(function() {
        //     $('select').niceSelect();
        // });
    </script>
@endsection
