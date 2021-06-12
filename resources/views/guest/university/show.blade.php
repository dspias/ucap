@extends('layouts.student.app')

@section('page_title', __('Universitiy Details'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
        .theme-ov[data-overlay]:before {
            background: linear-gradient(-90deg, #ed0b0b 1%, #222222 60% );
        }

        .trips_icons {
            width: 40px;
            height: 40px;
            font-size: 1rem;
            background-color: #ed0b0b;
            color: #ffffff;
            cursor: pointer;
        }
        .university-logo{
            max-width: 100px;
            margin-bottom: 10px;
        }

        .border{
            border: 0px solid #f4f4f4 !important;
        }
    </style>
@endsection



@section('content')
    @php
        if(!is_null($url = has_media($university->university, 'cover')))
            $url = show_image($url);
        else
            $url = "https://via.placeholder.com/1920x650";
    @endphp

<!-- Start Content Section -->
<!-- ============================ program Header Info Start================================== -->
<div class="image-cover ed_detail_head lg theme-ov" style="background:#f4f4f4 url({{ $url }});" data-overlay="9">
    <div class="container">
        <div class="row">

            <div class="col-lg-7 col-md-7">
                <div class="ed_detail_wrap light">
                    <div class="ed_header_caption">
                        @if (!is_null($logo_url = has_media($university->university, 'logo')))
                            <img src="{{ show_image($logo_url) }}" alt="No Logo" class="img-responsive university-logo">                            
                        @endif
                        <h2 class="ed_title">{{ $university->name }}</h2>
                        <ul>
                            <li>
                                <i class="ti-map"></i>
                                {{ optional(optional(optional(optional($university->university)->city)->state)->country)->name. ', '. optional(optional(optional($university->university)->city)->state)->name. ', '. optional(optional($university->university)->city)->name }}
                            </li>
                        </ul>
                    </div>
                    {{-- <div class="ed_header_short">
                        <p>Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore. veritatis et quasi architecto beatae vitae dicta sunt explicabo.</p>
                    </div> --}}

                    <div class="ed_rate_info">
                        <ul class="social_info">
                            <li>
                                <a href="{{ optional($university->university)->website }}" target="_blank" class="mb-2" data-toggle="tooltip" data-title="{{ __('Visit University Website') }}">
                                    <i class="ti-world"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ optional($university->university)->facebook }}" target="_blank" class="mb-2" data-toggle="tooltip" data-title="{{ __('Visit University Official Facebook Page') }}">
                                    <i class="ti-facebook"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ optional($university->university)->twitter }}" target="_blank" class="mb-2" data-toggle="tooltip" data-title="{{ __('Visit University Official Twitter Account') }}">
                                    <i class="ti-twitter"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ optional($university->university)->linkedin }}" target="_blank" class="mb-2" data-toggle="tooltip" data-title="{{ __('Visit University Official Linkedin Account') }}">
                                    <i class="ti-linkedin"></i>
                                </a>
                            </li>
                            <li>
                                <a href="{{ optional($university->university)->instagram }}" target="_blank" class="mb-2" data-toggle="tooltip" data-title="{{ __('Visit University Official instagram Account') }}">
                                    <i class="ti-instagram"></i>
                                </a>
                            </li>
                            <li>
                                <a href="tel:{{ optional($university->university)->phone }}" target="_blank" class="mb-2" data-toggle="tooltip" data-title="{{ __('Contact Number') }}">
                                    <i class="ti-headphone-alt"></i>
                                </a>
                            </li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ program Header Info End ================================== -->


<!-- ============================ University Features Starts ================================== -->
{{-- <div class="trips_wrap full">
    <div class="container-fluid">
        <div class="row m-0 justify-content-center">
            <div class="col-2">
                <div class="trips">
                    <div class="trips_icons" data-toggle="tooltip" data-title="{{ __('Offers Transportation?') }}">
                        <i class="fa fa-bus"></i>
                    </div>
                    <div class="trips_detail">
                        <h4>@if(optional($university->university)->is_transport == true) {{ __('Yes') }} @else {{ __('No') }} @endif</h4>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="trips">
                    <div class="trips_icons" data-toggle="tooltip" data-title="{{ __('Total Students') }}">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="trips_detail">
                        <h4>{{ (optional($university->university)->student_number/1000) }}k+</h4>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="trips">
                    <div class="trips_icons" data-toggle="tooltip" data-title="{{ __('Offers Scholarship?') }}">
                        <i class="fa fa-graduation-cap"></i>
                    </div>
                    <div class="trips_detail">
                        <h4>@if(optional($university->university)->is_scholarship == true) {{ __('Yes') }} @else {{ __('No') }} @endif</h4>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="trips">
                    <div class="trips_icons" data-toggle="tooltip" data-title="{{ __('Approximate Living Cost / Year') }}">
                        <i class="fa fa-credit-card"></i>
                    </div>
                    <div class="trips_detail">
                        <h4>{{ ucap_get('currency_sign').optional($university->university)->living_cost }}</h4>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="trips">
                    <div class="trips_icons" data-toggle="tooltip" data-title="{{ __('Average Weather') }}">
                        <i class="fa fa-cloud"></i>
                    </div>
                    <div class="trips_detail">
                        <h4>{{ optional($university->university)->weather }} <sup class="text-muted">°C</sup></h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<!-- ============================ University Features End ================================== -->



<!-- ============================ program Detail ================================== -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="edu_wraper border">
                    <div class="sec-heading center">
                        <h2>
                            <span class="theme-cl">{{ __('About') }}</span>
                            {{ __('University') }}
                        </h2>
                        <p>{{ __('Know about '. $university->name) }}</p>
                    </div>

                    <div class="row align-items-center">

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="about-short">
                                <div class="sec-heading mb-3">
                                    <h2>{{ __('Know about') }} <span class="theme-cl">{{ $university->name }}</span></h2>
                                </div>
                                <p class="pb-3">
                                    {!! optional($university->university)->about !!}
                                </p>
                                {{-- <div class="cource_facts">
                                    <ul>
                                        <li><span class="theme-cl">{{ (optional($university->university)->student_number/1000) }}k+</span>{{ __('Students') }}</li>
                                        <li><span class="theme-cl">{{ $university->faculties()->whereStatus(true)->count() }}+</span>{{ __('Faculties') }}</li>
                                        <li><span class="theme-cl">{{ $programs->count() }}+</span>{{ __('Programs') }}</li>
                                    </ul>
                                </div> --}}
                                <a href="{{ optional($university->university)->website }}" target="_blank" class="btn btn-modern">{{ __('Know More') }}<span><i class="ti-arrow-right"></i></span></a>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-12">
                            {{-- <div class="list_facts_wrap_img">
                                <img src="{{ $url }}" class="img-fluid" alt="">
                            </div> --}}
                            <div class="property_video">
								<div class="thumb">
									<img class="pro_img img-fluid w100" src="{{ $url }}" alt="No Thumbnail">
									<div class="overlay_icon">
										<div class="bb-video-box">
											<div class="bb-video-box-inner">
												<div class="bb-video-box-innerup">
													<a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-toggle="modal" data-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>

                            @include('guest.university.modals.video')
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 text-center mb-4">
                {{-- <p>{{ __('Facilitie\'s') }}</p> --}}
                <h2>
                    {{ __('University') }}
                    <span class="theme-cl">{{ __('Overview') }}</span>
                </h2>
            </div>
            
            <div class="col-md-6">                
                <div class="property_video lg">
                    <div class="thumb">
                        <img class="pro_img img-fluid w100" src="https://via.placeholder.com/1920x650" alt="7.jpg">
                        <div class="overlay_icon">
                            <div class="bb-video-box">
                                <div class="bb-video-box-inner">
                                    <div class="bb-video-box-innerup">
                                        <a href="https://www.youtube.com/watch?v=A8EI6JaFbv4" data-toggle="modal" data-target="#popup-video" class="theme-cl"><i class="ti-control-play"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>                
            </div>
            
            <div class="col-md-3">
                <div class="ed_detail_wrap">
                    <ul class="list_ed_detail2">
                        <li class="tag-{{ rand(0, 7) }}">
                            <i class="fa fa-bus"></i>
                            <strong>{{ __('Transportation') }}:</strong>
                            <strong>@if(optional($university->university)->is_transport == true) {{ __('Yes') }} @else {{ __('No') }} @endif</strong>
                        </li>
                        <li class="tag-{{ rand(0, 7) }}">
                            <i class="fa fa-graduation-cap"></i>
                            <strong>{{ __('Scholarship') }}:</strong>
                            <strong>@if(optional($university->university)->is_scholarship == true) {{ __('Yes') }} @else {{ __('No') }} @endif</strong>
                        </li>
                        <li class="tag-{{ rand(0, 7) }}">
                            <i class="fa fa-users"></i>
                            <strong>{{ __('Students') }}:</strong>
                            <strong>{{ floor(optional($university->university)->student_number/1000) }}k+</strong>
                        </li>
                        <li class="tag-{{ rand(0, 7) }}">
                            <i class="ti-world"></i>
                            <strong>{{ __('World Rank') }}:</strong>
                            <strong>{{ optional($university->university)->world_rank }}</strong>
                        </li>
                        <li class="tag-{{ rand(0, 7) }}">
                            <i class="ti-signal"></i>
                            <strong>{{ __('National Rank') }}:</strong>
                            <strong>{{ optional($university->university)->national_rank }}</strong>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="col-md-3">
                <div class="ed_detail_wrap">
                    <ul class="list_ed_detail2">
                        <li class="tag-{{ rand(0, 7) }}">
                            <i class="fa fa-cloud"></i>
                            <strong>{{ __('Weather') }}:</strong>
                            <br>
                            <p class="mb-0 text-bold">
                                Summer: {{ optional($university->university)->summer_min }} <sup class="text-bold">°C</sup>
                                <i class="ti-minus mr-0"></i>
                                {{ optional($university->university)->summer_max }} <sup class="text-bold">°C</sup>
                            </p>
                            <p class="mb-0 text-bold">
                                Winter: {{ optional($university->university)->winter_min }} <sup class="text-bold">°C</sup>
                                <i class="ti-minus mr-0"></i>
                                {{ optional($university->university)->winter_max }} <sup class="text-bold">°C</sup>
                            </p>
                        </li>
                        <li class="tag-{{ rand(0, 7) }}">
                            <i class="fa fa-users"></i>
                            <strong class="mr-0">{{ __('Living Cost') }}</strong> <sup class="text-bold text-ucap pl-0">(Per Month)</sup>:
                            <br>
                            <p class="mb-0 text-bold">{{ __('Residence Housing : ') }}{{ floor(optional($university->university)->residence_housing_min/1000) }}k <i class="ti-minus mr-0"></i> {{ floor(optional($university->university)->residence_housing_max/1000) }}k</p>
                            {{-- <br> --}}
                            <p class="mb-0 text-bold">{{ __('Off-Campus Housing : ') }}{{ floor(optional($university->university)->off_campus_housing_min/1000) }}k <i class="ti-minus mr-0"></i> {{ floor(optional($university->university)->off_campus_housing_max/1000) }}k</p>
                        </li>
                        <li class="tag-{{ rand(0, 7) }}">
                            <i class="fa fa-users"></i>
                            <strong class="mr-0">{{ __('Meal Cost') }}</strong> <sup class="text-bold text-ucap pl-0">(Per Month)</sup>:
                            <br>
                            <p class="mb-0 text-bold">{{ __('Residence Meal : ') }}{{ floor(optional($university->university)->residence_meal_min/1000) }}k <i class="ti-minus mr-0"></i> {{ floor(optional($university->university)->residence_meal_max/1000) }}k</p>
                            {{-- <br> --}}
                            <p class="mb-0 text-bold">{{ __('Off-Campus Meal : ') }}{{ floor(optional($university->university)->off_campus_meal_min/1000) }}k <i class="ti-minus mr-0"></i> {{ floor(optional($university->university)->off_campus_meal_max/1000) }}k</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        <div class="row mt-5">
            <div class="col-md-12">
                <div class="edu_wraper border">
                    <div class="sec-heading center">
                        <p>{{ __('Active Faculties of ') . $university->name }}</p>
                        <h2>
                            {{ __('Active') }}
                            <span class="theme-cl">{{ __('Faculties') }}</span>
                        </h2>
                    </div>


                    <div class="four_slide-dots articles arrow_middle">
                        {{-- Single Slide Start --}}
                        @php
                            $faculties = $university->faculties()->whereStatus(true)->get();
                        @endphp
                        @foreach($faculties as $faculty)
                        <div class="edu_cat_2 no-shadow mr-2 ml-2 cat-{{ rand(1,10) }}" onclick="location.href='{{ route('guest.faculty.show', ['faculty_id' => decbin($faculty->id), 'faculty_name' => get_name($faculty->name)]) }}';">
                            <div class="edu_cat_data">
                                <h4 class="title">
                                    <a href="javascript:void(0);">{{ $faculty->name }}</a>
                                </h4>
                                <ul class="meta inline_edu_last">
                                    <li class="video">
                                        <i class="ti-ruler-pencil"></i>
                                        <span>{{ __('Total Programs: ') }}</span>
                                        <strong class="text-ucap">{{ $faculty->programs()->whereStatus(true)->count() }}+</strong>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        @endforeach
                        {{-- Single Slide End --}}
                    </div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-md-12">
                <div class="edu_wraper border">
                    {{-- <h4 class="edu_title text-center">{{ __('Active programs') }}</h4> --}}
                    <div class="sec-heading center">
                        <h2>
                            {{ __('Active') }}
                            <span class="theme-cl">{{ __('Programs') }}</span>
                        </h2>
                        <p>{{ __('Active programs of ') . $university->name }}</p>
                    </div>

                    <div class="shadow">
                        <div class="row">
                            @foreach ($programs as $program)
                            <div class="col-lg-4 col-md-4 col-sm-6">
                                <div class="edu_cat_2 no-shadow cat-{{ rand(1,10) }}">
                                    <div class="edu_cat_icons">
                                        <a class="pic-main" href="{{ route('guest.program.show', ['program_id' => decbin($program->id), 'program_title' => get_name($program->name)]) }}">
                                            <h2 class="mb-0">{{ $program->short_name }}</h2>
                                        </a>
                                    </div>
                                    <div class="edu_cat_data">
                                        <h4 class="title">
                                            <a href="{{ route('guest.program.show', ['program_id' => decbin($program->id), 'program_title' => get_name($program->name)]) }}">{{ $program->name }}</a>
                                        </h4>
                                        <ul class="meta inline_edu_last">
                                            <li class="video">
                                                <i class="ti-time"></i>
                                                <strong class="text-ucap">{{ monthyear($program->program_duration) }}</strong>
                                                <span>{{ __('Years') }}</span>
                                            </li>
                                            <li class="video ml-2">
                                                <i class="ti-file"></i>
                                                <strong class="text-ucap">{{ $program->program_semester }}</strong>
                                                <span>{{ __('Semester\'s') }}</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ program Detail ================================== -->

{{-- @include('guest.university.modals.video') --}}
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
