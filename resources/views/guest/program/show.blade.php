@extends('layouts.student.app')

@section('page_title', __('Program Details'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
        .theme-ov[data-overlay]:before {
            background: #131b31;
            opacity: 0.7;
        }

        .trips_icons {
            width: 40px;
            height: 40px;
            font-size: 1rem;
        }

        hr.break{
            position: relative;
            margin-top: 0rem;
            margin-bottom: 0rem;
        }
        hr.break::before {
            content: 'OR';
            position: absolute;
            top: -16px;
            left: 46%;
            font-size: 20px;
            font-weight: bold;
            color: #f40808;
            background: white;
            width: 40px;
            text-align: center;
        }
    </style>
@endsection


@php
    $university = optional($program->faculty)->university;
    $country = optional(optional(optional($university->university)->city)->state)->country;
    $state = optional(optional($university->university)->city)->state;
    $city = optional($university->university)->city;
    // dd($university);
@endphp

@php
    $applySessions = upcomming_sessions($program);
@endphp


@section('content')

<!-- Start Content Section -->
<!-- ============================ Program Header Info Start================================== -->
<div class="image-cover ed_detail_head lg theme-ov" style="background:#f4f4f4 url(https://via.placeholder.com/1920x650?text={{ $program->short_name }});" data-overlay="9">
    <div class="container">
        <div class="row">

            <div class="col-lg-7 col-md-7">
                <div class="ed_detail_wrap light">
                    <div class="ed_header_caption">
                        <h2 class="ed_title text-ucap">{{ $program->name }}</h2>
                        <ul>
                            <li>
                                <a href="javascript:void(0);" class="text-white" data-toggle="tooltip" data-title="{{ __('Province') }}">
                                    <i class="ti-map"></i>
                                    {{ optional($state)->name }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('guest.university.show', ['id' => decbin(optional($university)->id), 'name' => get_name(optional($university)->name)]) }}" class="text-white" data-toggle="tooltip" data-title="{{ __('University') }}">
                                    <i class="ti-tag"></i>
                                    {{ optional($university)->name }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('guest.faculty.show', ['faculty_id' => decbin(optional($program->faculty)->id), 'faculty_name' => get_name(optional($program->faculty)->name)]) }}" class="text-white" data-toggle="tooltip" data-title="{{ __('Faculty') }}">
                                    <i class="ti-bookmark"></i>
                                    {{ optional($program->faculty)->name }}
                                </a>
                            </li>
                            <li>
                                <a href="{{ $program->website }}" target="_blank" class="text-white text-capitalize" data-toggle="tooltip" data-title="{{ __('University Official Program Page') }}">
                                    <i class="ti-world"></i>
                                    {{ __('Visit website') }}
                                </a>
                            </li>
                        </ul>
                        <p class="pt-3">{{ __('Fees and costs are estimated. Your actual cost of attending university will depend on many factors in addition to the program of your choice. For complete fee details') }} <span><a href="{{ $program->website }}" target="_blank" class="text-bold text-white">{{ __('Visit website') }}</a></span></p>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
<!-- ============================ Program Header Info End ================================== -->



<!-- ============================ Program Detail ================================== -->
<section>
    <div class="container">
        <div class="row d-flex justify-content-center">

            <div class="col-lg-8 col-md-8">

                <!-- ===========================< Program Overview >========================== -->
                <div class="edu_wraper border">
                    <h4 class="edu_title">{{ __('Program Overview') }}</h4>
                    <p>{!! $program->program_overview !!}</p>
                </div>

                <!-- ===========================< Program Requirements >========================== -->
                <div class="edu_wraper border">
                    <h4  class="edu_title">{{ __('Admission Requirements') }}</h4>
                    <ul class="lists-3">
                        @foreach ($program->requirements as $requirement)
                        <li>{{ $requirement->requirement }}</li>
                        @endforeach
                    </ul>
                </div>


                <!-- ===========================< course curriculum >========================== -->
                <div class="edu_wraper border">
                    <h4 class="edu_title">{{ __('Program Curriculum') }}</h4>
                    <div id="ProgramCurricullum" class="accordion shadow circullum">
                        @php
                            $curriculums = $program->curriculums()->orderBy('semester_no', 'asc')->get();
                        @endphp
                        @foreach($curriculums as $sl => $curriculum)
                        <!-- Part 1 -->
                        <div class="card">
                            <div id="headingOne" class="card-header bg-white shadow-sm border-0">
                                <h6 class="mb-0 accordion_title">
                                    <a href="#" data-toggle="collapse" data-target="#semester_0{{ $sl }}" aria-expanded="{{ ($sl == 0) ? 'true':'false' }}" aria-controls="semester_0{{ $sl }}" class="d-block position-relative text-dark collapsible-link py-2">
                                        Semester {{ $sl+1 }}: {{$curriculum->title}}
                                    </a>
                                </h6>
                            </div>
                            <div id="semester_0{{ $sl }}" aria-labelledby="headingOne" data-parent="#ProgramCurricullum" class="collapse {{ ($sl == 0) ? 'show':'' }}">
                                <div class="card-body pl-3 pr-3 pb-0 pt-3">
                                    <table class="table table-bordered table-responsive-sm">
                                        <thead>
                                            <tr class="bg-ucap">
                                                <th class="text-center text-bold">{{ 'Subject' }}</th>
                                                <th class="text-center text-bold">{{ 'Code' }}</th>
                                                <th class="text-center text-bold">{{ 'Credit' }}</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($curriculum->courses as $course)
                                            <tr>
                                                <td class="text-center text-bold">{{ $course->name }}</td>
                                                <td class="text-center">{{ $course->code }}</td>
                                                <td class="text-center">{{ $course->credit }}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>



                <!-- ===========================< Career Path >========================== -->
                <div class="edu_wraper border">
                    <h4 class="edu_title">{{ __('Career Path') }}</h4>
                    <p>{!! $program->career_path !!}</p>
                </div>

            </div>

            <!-- Sidebar -->
            <div class="col-lg-4 col-md-4">

                @if(Auth::check() && Auth::user()->role->slug == 'student' && $applySessions->count() > 0)
                <a href="#ApplyFromHere" class="btn btn-custom bg-ucap btn-block mb-4 text-bold text-uppercase">{{ __('Apply') }}</a>
                @endif


                {{-- ================< Program Fees >================ --}}
                <div class="edu_wraper border">
                    <h4 class="edu_title">{{ __('Program Fees') }}</h4>
                    <ul class="edu_list right">
                        <li>
                            <i class="ti-check-box text-ucap"></i>
                            {{ __('Annual Fee') }}:
                            <strong>{{ ucap_get('currency_sign'). $program->yearly_fee }}</strong>
                        </li>
                        <li>
                            <i class="ti-check-box text-ucap"></i>
                            {{ __('Application Fee') }}:
                            <strong>{{ ucap_get('currency_sign'). $program->application_fee }}</strong>
                        </li>
                        <li>
                            <i class="ti-check-box text-ucap"></i>
                            {{ __('Credit Fee') }} <sup class="text-muted">[{{ __('Per Credit') }}]</sup>:
                            <strong>{{ ucap_get('currency_sign'). $program->credit_fee }}</strong>
                        </li>
                        <li>
                            <i class="ti-check-box text-ucap"></i>
                            {{ __('Lab Fee') }} <sup class="text-muted">[{{ __('Per Semester') }}]</sup>:
                            <strong>{{ ucap_get('currency_sign'). $program->lab_fee }}</strong>
                        </li>
                        <li>
                            <i class="ti-check-box text-ucap"></i>
                            {{ __('Retake Fee') }} <sup class="text-muted">[{{ __('Per Credit') }}]</sup>:
                            <strong>{{ ucap_get('currency_sign'). $program->retake_fee }}</strong>
                        </li>
                        <li>
                            <i class="ti-check-box text-ucap"></i>
                            {{ __('Extra Fee') }} <sup class="text-muted">[{{ __('Per Semester') }}]</sup>:
                            <strong>{{ ucap_get('currency_sign'). $program->extra_fee }}</strong>
                        </li>
                    </ul>
                </div>

                {{-- ================< Language Requirements >================ --}}
                <div class="edu_wraper border">
                    <h4 class="edu_title">{{ __('Language Requirements') }}</h4>
                    <ul class="edu_list right">
                        @php
                            $languageTests = $program->languageTests()->withPivot(['band', 'individual', 'details'])->get();
                        @endphp
                        @foreach ($languageTests as $nn =>  $lang)
                        @if($nn != 0)<li><hr class="break"></li>@endif
                        <li>
                            <i class="ti-check-box text-ucap"></i>
                            {{ $lang->name }}:
                            <strong>{{ __('Min: ') }}{{ $lang->pivot->band }}</strong>
                            @if($lang->pivot->individual == true)
                            <ul class="ml-5">
                                <li class="p-1 pr-3">
                                    <strong class="text-muted text-light">{{ $lang->pivot->details }}</strong>
                                </li>
                            </ul>
                            @endif
                        </li>
                        @endforeach
                    </ul>
                </div>

                {{-- ================< Program Features >================ --}}
                <div class="ed_view_box border">
                    <div class="ed_view_features">
                        <h5 class="edu_title mb-4">{{ __('Program Features') }}</h5>
                        <ul>
                            @foreach ($program->features as $feature)
                            <li><i class="ti-angle-right"></i>{{ $feature->feature }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                {{-- ================< Program Basics >================ --}}
                <div class="edu_wraper border">
                    <h4 class="edu_title">{{ __('Program Basics') }}</h4>
                    <ul class="edu_list right">
                        <li>
                            <i class="ti-bell text-ucap"></i>
                            {{ __('Program Duration') }}:
                            <strong>{{ monthyear($program->program_duration) }} {{ __('Years') }}</strong>
                        </li>
                        <li>
                            <i class="ti-bell text-ucap"></i>
                            {{ __('Total Semester:') }}:
                            <strong>{{ $program->program_semester }}</strong>
                        </li>
                        <li>
                            <i class="ti-bell text-ucap"></i>
                            {{ __('Semester Duration:') }}:
                            <strong>{{ $program->semester_duration }} {{ __('Months') }}</strong>
                        </li>
                        <li>
                            <i class="ti-bell text-ucap"></i>
                            {{ __('Internship:') }}:
                            <strong>{{ $program->internship }}</strong>
                        </li>
                    </ul>
                </div>

                {{-- ================< Program Sessions >================ --}}
                <div class="edu_wraper border">
                    @php
                        $sessions = $program->sessions()->orderBy('session_start')->get();
                    @endphp
                    @foreach ($sessions as $session)
                    <h4 class="edu_title">{{ $session->name }}</h4>
                    <ul class="edu_list right">
                        <li class="pb-0">
                            <i class="ti-arrow-right text-ucap"></i>
                            {{ __('Session Start:') }}:
                            <strong>{{ get_date($session->session_start, 'd M, Y') }}</strong>
                        </li>
                        <li>
                            <i class="ti-arrow-right text-ucap"></i>
                            {{ __('Application Deadline') }}:
                            <strong class="text-muted text-light">{{ get_date($session->application_deadline, 'd M, Y') }}</strong>
                        </li>
                    </ul>
                    @endforeach
                </div>
            </div>
            {{-- <button class="btn btn-dark bg-ucap rounded btn-block text-bold text-uppercase" type="submit" data-toggle="modal" data-target="#applyNow">{{ __('Apply') }}</button> --}}

            @if(Auth::check() && Auth::user()->role->slug == 'student'  && $applySessions->count() > 0)
            <div class="col-md-8" id="ApplyFromHere">
                {{-- ================<div Apply Program >================ --}}
                <div class="edu_wraper border text-center">
                    @if(!$is_cart)
                    <form action="{{ route('guest.program.addtocart', ['program_id' => decbin($program->id)]) }}" method="post">
                        @csrf
                        <ul style="display: inline-flex;">
                            @foreach ($applySessions as $appliable)
                            <li class="pr-4">
                                <input id="session[{{ $appliable->id }}]" class="checkbox-custom" name="session" value="{{ $appliable->id }}" type="radio" required>
                                <label for="session[{{ $appliable->id }}]" class="checkbox-custom-label">{{ $appliable->name }}</label>
                            </li>
                            @endforeach
                        </ul>
                        <div class="social-login mb-3">
                            <input id="accept" class="checkbox-custom accept-terms" name="accept" type="checkbox" required>
                            <label for="accept" class="checkbox-custom-label" style="font-size: 16px; font-weight: bold;">{{ __('I accept that I have all the required documents & I can fulfill the needed requirements.') }}</label>
                        </div>
                        <button class="btn btn-dark bg-ucap rounded btn-block text-bold" type="submit">
                            {{ __('Add to ') }}
                            <span class="text-uppercase">
                                {{ __('Apply Cart') }}
                            </span>
                        </button>
                    </form>
                    @else
                        <h4>{{ __('This program added to cart') }}</h4>
                    @endif
                </div>
            </div>
            @endif

        </div>
    </div>
</section>
<!-- ============================ Program Detail ================================== -->

{{-- @include('guest.Program.modals.apply') --}}
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        // $(document).ready(function(){
        //     if ($('input[name=session]:checked') && $('input.accept-terms').is(':checked')) {
        //         alert('Hello');
        //     } else {
        //         alert('WTF');
        //     }
        // });
    </script>
@endsection
