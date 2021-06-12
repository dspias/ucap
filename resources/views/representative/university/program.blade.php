@extends('layouts.representative.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('program | Details'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Datepicker css -->
    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .card .card-body .card{
        border: 1px solid #f6f6f6;
    }

    ul.requirement{
        padding-left: 0px;
    }

    ul.requirement li {
        list-style: none;
        font-size: 18px;
        font-weight: bold;
        padding: 3px 0px;
    }

    ul.feature{
        padding-left: 0px;
    }

    ul.feature li {
        list-style: none;
        font-size: 18px;
        font-weight: bold;
        padding: 3px 0px;
    }

    .program-subject-name{
        width: 60% !important;
    }
    .program-subject-code{
        width: 20% !important;
    }
    .program-subject-credit{
        width: 15% !important;
    }
    .program-subject-delete{
        width: 5% !important;
    }
    </style>
@endsection


@section('page_name')
    @php
        $status = ($program->status == true) ? '<span class="badge badge-success">Activeted</span>' : '<span class="badge badge-danger">Inactiveted</span>';
    @endphp
    <b class="text-capitalize">
        {{ $program->name }} <span class="text-muted">({{ $program->level }})</span> {!! $status !!}
        <br>
        <h6 class="text-center-sm">
            <span>
                <a href="{{ route('superadmin.university.show', ['id' => optional(optional($program->faculty)->university)->id, 'page' => 'all']) }}" class="text-muted text-center">
                    {{ optional(optional($program->faculty)->university)->name }}
                </a>
            </span>
            <span> (</span>
            <span>
                <a href="{{ route('superadmin.university.faculty.show', ['uni_id' => decbin(optional(optional($program->faculty)->university)->id), 'faculty_id' => decbin(optional($program->faculty)->id)]) }}" class="text-muted text-center">
                    {{ optional($program->faculty)->name }}
                </a>
            </span>
            <span>)</span>
        </h6>
    </b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Universities') }}</li>
    <li class="breadcrumb-item">
        <a href="{{ route('superadmin.university.index') }}">
            {{ __('All Universities') }}
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('superadmin.university.show', ['id' => optional(optional($program->faculty)->university)->id, 'page' => 'all']) }}">
            {{ __('Details') }}
        </a>
    </li>
    <li class="breadcrumb-item">
        <a href="{{ route('superadmin.university.faculty.show', ['uni_id' => decbin(optional(optional($program->faculty)->university)->id), 'faculty_id' => decbin(optional($program->faculty)->id)]) }}">
            {{ __('Faculty') }}
        </a>
    </li>
    <li class="breadcrumb-item active">{{ __('Program') }}</li>
@endsection


@section('action')
    <a href="{{ url()->previous() }}" class="btn btn-custom">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#editProgram" class="btn btn-custom bg-ucap">
        <i class="ti-pencil mr-1"></i>
        {{ __('Edit program') }}
    </a>
    @include('superadmin.university.program.modals.edit_program')
@endsection



@section('content')

<!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-8">
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title float-left">{{ __('program Overview') }}</h4>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programOverview" class="btn btn-custom btn-sm float-right">
                        <span data-toggle="tooltip" title="{{ __('Edit program Overview') }}"><i class="ti-pencil"></i></span>
                    </a>
                    @include('superadmin.university.program.modals.program_overview')
                </div>

                <div class="card-body">
                    {!! $program->program_overview !!}
                </div>
            </div>

            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title float-left">{{ __('Career Path') }}</h4>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#careerOpportunities" class="btn btn-custom btn-sm float-right">
                        <span data-toggle="tooltip" title="{{ __('Edit Career Opportunities') }}"><i class="ti-pencil"></i></span>
                    </a>
                    @include('superadmin.university.program.modals.career')
                </div>

                <div class="card-body">
                    {!! $program->career_path !!}
                </div>
            </div>


            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title float-left">{{ __('Requirements') }}</h4>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addRequirement" class="btn btn-custom btn-sm float-right">
                        <span data-toggle="tooltip" title="{{ __('Add Requirement') }}"><i class="ti-plus"></i></span>
                    </a>
                    @include('superadmin.university.program.modals.add_requirement')

                    <a href="javascript:void(0);" data-toggle="modal" data-target="#removeRequirement" class="btn btn-danger btn-sm float-right m-r-10">
                        <span data-toggle="tooltip" title="{{ __('Remove Requirement') }}"><i class="ti-close"></i></span>
                    </a>
                    @include('superadmin.university.program.modals.remove_requirement')
                </div>

                <div class="card-body">
                    <ul class="requirement">
                        @foreach ($program->requirements as $requirement)
                        <li>
                            <i class="feather icon-check-circle p-r-5 text-ucap font-16"></i>
                            <span class="text-capitalize">{{ $requirement->requirement }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>
            </div>


            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title float-left">{{ __('program Curriculum') }}</h4>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programCurriculum" class="btn btn-custom btn-sm float-right">
                        <span data-toggle="tooltip" title="{{ __('Assign New Semester & Subjects') }}"><i class="ti-plus"></i></span>
                    </a>
                    @include('superadmin.university.program.modals.program_curriculum')
                </div>

                <div class="card-body">
                    @php
                        $curriculums = $program->curriculums()->orderBy('semester_no', 'asc')->get();
                    @endphp
                    @foreach($curriculums as $curriculum)
                    <table class="table table-bordered" style="margin-bottom: 20px !important;">
                        <thead class="bg-ucap">
                            <tr>
                                <th style="border: 0px solid #fff;">
                                    <span class="text-bold">{{ __('Semester: '). $curriculum->title }}</span>
                                </th>
                                <th colspan="2" class="text-right" style="border: 0px solid #fff;">
                                    <span class="text-white">{{ 'Duration: '.$program->semester_duration.' Months' }}</span>
                                </th>
                            </tr>
                        </thead>
                        <thead>
                            <tr>
                                <th class="text-left" style="width: 60%;">{{ __('Subject') }}</th>
                                <th class="text-left" style="width: 20%;">{{ __('Code') }}</th>
                                <th class="text-left" style="width: 20%;">{{ __('Credit') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($curriculum->courses as $course)
                            <tr>
                                <th class="text-left" style="width: 60%;">
                                    {{ $course->name }}
                                </th>
                                <td class="text-left" style="width: 20%;">
                                    {{ $course->code }}
                                </td>
                                <td class="text-left" style="width: 20%;">
                                    {{ $course->credit }}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <td colspan="3" class="text-center">
                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programCurriculumEdit" class="btn btn-custom btn-sm">
                                        <span data-toggle="tooltip" title="{{ __('Add Requirement') }}">
                                            <i class="ti-pencil"></i>
                                            {{ __('Edit') }}
                                        </span>
                                    </a>
                                    <a href="{{ route('superadmin.university.faculty.program.curriculum.remove', ['curriculum_id' => decbin($curriculum->id)]) }}" class="btn btn-custom btn-sm confirm" title="{{ __('Remove This Semester & Subjects?') }}" confirm="Are you sure want to Remove this Semester & Subjects?">
                                        <i class="ti-trash"></i>
                                        {{ __('Delete') }}
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    @endforeach
                    @include('superadmin.university.program.modals.program_curriculum_edit')
                </div>
            </div>
        </div>
        <!-- End col -->

        {{-- start col --}}
        <div class="col-lg-4">
            {{-- general start --}}
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title text-bold float-left">{{ __('Program Basic') }}</h4>
                </div>

                <div class="card-body">
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Program Duration: ') }}</span>
                        <span class="text-ucap">{{ monthyear($program->program_duration)." Year" }}</span>
                    </h5>
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Total Semester: ') }}</span>
                        <span class="text-ucap">{{ $program->program_semester }}</span>
                    </h5>
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Semester Duration: ') }}</span>
                        <span class="text-ucap">{{ $program->semester_duration." Months" }}</span>
                    </h5>
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Application Start: ') }}</span>
                        <span class="text-ucap">{{ get_date($program->start_date, 'd M, Y') }}</span>
                    </h5>
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Applicaiton End: ') }}</span>
                        <span class="text-ucap">{{ get_date($program->end_date, 'd M, Y') }}</span>
                    </h5>
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Internship: ') }}</span>
                        <span class="text-ucap">{{ $program->internship }}</span>
                    </h5>
                </div>

                <div class="card-footer">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programDetails" class="btn btn-custom btn-sm float-right">
                        <span data-toggle="tooltip" title="{{ __('Edit program General Details') }}">
                            <i class="ti-pencil"></i>
                        </span>
                    </a>
                    @include('superadmin.university.program.modals.general_details')
                </div>
            </div>
            {{-- general close --}}

            {{-- fees start --}}
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title text-bold float-left">{{ __('Program Fees') }}</h4>
                </div>

                <div class="card-body">
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Yearly Fee: ') }}</span>
                        <span class="text-ucap">{{ ucap_get('currency_sign'). $program->yearly_fee }}</span>
                    </h5>
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Application Fee: ') }}</span>
                        <span class="text-ucap">{{ ucap_get('currency_sign'). $program->application_fee }}</span>
                    </h5>
                    <h5 class="text-bold p-t-10">
                        <span class="text-muted">{{ __('Credit Fee: ') }}</span>
                        <span class="text-ucap">{{ ucap_get('currency_sign'). $program->credit_fee }}</span>
                        <sup><small class="text-muted">{{ __('(Per Credit)') }}</small></sup>
                    </h5>
                    <h5 class="text-bold p-t-10">
                        <span class="text-muted">{{ __('Lab Fee: ') }}</span>
                        <span class="text-ucap">{{ ucap_get('currency_sign'). $program->lab_fee }}</span>
                        <sup><small class="text-muted">{{ __('(Per Semester)') }}</small></sup>
                    </h5>
                    <h5 class="text-bold p-t-10">
                        <span class="text-muted">{{ __('Retake Fee: ') }}</span>
                        <span class="text-ucap">{{ ucap_get('currency_sign'). $program->retake_fee }}</span>
                        <sup><small class="text-muted">{{ __('(Per Credit)') }}</small></sup>
                    </h5>
                    <h5 class="text-bold p-t-10">
                        <span class="text-muted">{{ __('Extra Fee: ') }}</span>
                        <span class="text-ucap">{{ ucap_get('currency_sign'). $program->extra_fee }}</span>
                        <sup><small class="text-muted">{{ __('(Per Semester)') }}</small></sup>
                    </h5>
                </div>

                <div class="card-footer">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programPricing" class="btn btn-custom btn-sm float-right">
                        <span data-toggle="tooltip" title="{{ __('Edit program Pricing') }}">
                            <i class="ti-pencil"></i>
                        </span>
                    </a>
                    @include('superadmin.university.program.modals.pricing')
                </div>
            </div>
            {{-- fees close --}}

            {{-- features start --}}
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title text-bold">{{ __('Program Features') }}</h4>
                </div>

                <div class="card-body">
                    <ul class="feature">

                        @foreach ($program->features as $feature)
                        <li>
                            <i class="feather icon-feather p-r-5 text-ucap font-16"></i>
                            <span class="text-capitalize">{{ $feature->feature }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="card-footer">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programFeature" class="btn btn-custom btn-sm float-right">
                        <span data-toggle="tooltip" title="{{ __('Add Feature') }}">
                            <i class="ti-plus"></i>
                        </span>
                    </a>
                    @include('superadmin.university.program.modals.feature')

                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programFeatureRemove" class="btn btn-danger btn-sm float-right m-r-10">
                        <span data-toggle="tooltip" title="{{ __('Remove Feature') }}">
                            <i class="ti-close"></i>
                        </span>
                    </a>
                    @include('superadmin.university.program.modals.remove_feature')
                </div>
            </div>
            {{-- features close --}}

            {{-- language test start --}}
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title text-bold">{{ __('Required Language Test') }}</h4>
                </div>

                <div class="card-body">
                    <ul class="feature">

                        @foreach ($program->languageTests as $lang)
                        <li>
                            <i class="feather icon-feather p-r-5 text-ucap font-16"></i>
                            <span class="text-capitalize">{{ $lang->name }}</span>
                        </li>
                        @endforeach
                    </ul>
                </div>

                <div class="card-footer">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programLangugage" class="btn btn-custom btn-sm float-right">
                        <span data-toggle="tooltip" title="{{ __('Add Langugage Test') }}">
                            <i class="ti-plus"></i>
                        </span>
                    </a>
                    @include('superadmin.university.program.modals.add_language')

                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programlanguageRemove" class="btn btn-danger btn-sm float-right m-r-10">
                        <span data-toggle="tooltip" title="{{ __('Remove Language Test') }}">
                            <i class="ti-close"></i>
                        </span>
                    </a>
                    @include('superadmin.university.program.modals.remove_language')
                </div>
            </div>
            {{-- language test close --}}
        </div>
        {{-- end col --}}
    </div>
<!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Datepicker JS -->
    <script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-datepicker.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // edit program name and level
    </script>
@endsection
