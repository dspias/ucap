@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __($page_title. ' | Program Details'))

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
        width: 20% !important;
    }
    </style>
@endsection




@section('page_name')
    @php
        $status = ($program->status == true) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
    @endphp
    <b class="text-capitalize">
        {{ $program->name }} <span class="text-muted">({{ $program->level }})</span> {!! $status !!}
    </b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('programs') }}</li>
    <li class="breadcrumb-item">
        @if ($page == 'all')
            <a href="{{ route('university.program.all') }}">{{ __($page_title) }}</a>
        @elseif ($page == 'active')
            <a href="{{ route('university.program.active') }}">{{ __($page_title) }}</a>
        @elseif ($page == 'inactive')
            <a href="{{ route('university.program.inactive') }}">{{ __($page_title) }}</a>
        @else
            <a href="{{ route('university.program.create') }}">{{ __($page_title) }}</a>
        @endif
    </li>
    <li class="breadcrumb-item active">{{ __('Details') }}</li>
@endsection


@section('action')
    @php
        if ($page == 'all')
            $url = 'university.program.all';
        elseif ($page == 'active')
            $url = 'university.program.active';
        elseif ($page == 'inactive')
            $url = 'university.program.inactive';
        else
            $url = 'university.program.create';
    @endphp
    <a href="{{ route($url) }}" class="btn btn-custom">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#editProgram" class="btn btn-custom bg-ucap">
        <i class="ti-pencil mr-1"></i>
        {{ __('Edit program') }}
    </a>
    @include('university.program.modals.edit_program')
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
                    @include('university.program.modals.program_overview')
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
                    @include('university.program.modals.career')
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
                    @include('university.program.modals.add_requirement')

                    <a href="javascript:void(0);" data-toggle="modal" data-target="#removeRequirement" class="btn btn-danger btn-sm float-right m-r-10">
                        <span data-toggle="tooltip" title="{{ __('Remove Requirement') }}"><i class="ti-close"></i></span>
                    </a>
                    @include('university.program.modals.remove_requirement')
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
                    @include('university.program.modals.program_curriculum')
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
                                    <a href="javascript:void(0);" data-toggle="modal" data-todo="{{ $curriculum }}" data-target="#programCurriculumEdit" class="btn btn-custom btn-sm">
                                        <span data-toggle="tooltip" title="{{ __('Add Requirement') }}">
                                            <i class="ti-pencil"></i>
                                            {{ __('Edit') }}
                                        </span>
                                    </a>
                                    <a href="{{ route('university.program.curriculum.remove', ['curriculum_id' => decbin($curriculum->id)]) }}" class="btn btn-custom btn-sm confirm" title="{{ __('Remove This Semester & Subjects?') }}" confirm="Are you sure want to Remove this Semester & Subjects?">
                                        <i class="ti-trash"></i>
                                        {{ __('Delete') }}
                                    </a>
                                </td>
                            </tr>
                        </tfoot>
                    </table>
                    @endforeach
                    @include('university.program.modals.program_curriculum_edit')
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
                        <span class="text-muted">{{ __('Total Credit: ') }}</span>
                        <span class="text-ucap">{{ $program->total_credit }}</span>
                    </h5>
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Internship: ') }}</span>
                        <span class="text-ucap">{{ $program->internship }}</span>
                    </h5>
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Scholarship: ') }}</span>
                        <span class="text-ucap">{{ $program->scholarship }}</span>
                    </h5>
                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Attendance Type: ') }}</span>
                        <span class="text-ucap">{{ $program->attendance_type }}</span>
                    </h5>

                    <h5 class="text-bold">
                        <span class="text-muted">{{ __('Website: ') }}</span>
                        @if(!is_null($program->website))
                        <a href="{{ $program->website }}" target="_blank"><span class="text-ucap">{{ __('Click') }}</span></a>
                        @endif
                    </h5>
                </div>

                <div class="card-footer">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programDetails" class="btn btn-custom btn-sm float-right">
                        <span data-toggle="tooltip" title="{{ __('Edit program General Details') }}">
                            <i class="ti-pencil"></i>
                        </span>
                    </a>
                    @include('university.program.modals.general_details')
                </div>
            </div>
            {{-- general close --}}


            {{-- Session start --}}
            <div class="card m-b-30">
                <div class="card-header">
                    <h4 class="card-title text-bold float-left">{{ __('Program Sessions') }}</h4>
                </div>

                <div class="card-body">
                    @php
                        $sessions = $program->sessions()->orderBy('session_start')->get();
                    @endphp
                    @foreach ($sessions as $session)
                        <h5 class="text-bold">{{ $session->name }}</h5>
                        <ul class="feature">
                            <li>
                                <i class="feather icon-feather p-r-2 text-ucap font-14"></i>
                                <span class="text-capitalize font-14">{{ __('Session Start: '). get_date($session->session_start, 'd M, Y') }}</span>
                            </li>
                            <li>
                                <i class="feather icon-feather p-r-2 text-ucap font-14"></i>
                                <span class="text-capitalize font-14">{{ __('Application Deadline: '). get_date($session->application_deadline, 'd M, Y') }}</span>
                            </li>
                        </ul>
                    @endforeach
                </div>

                <div class="card-footer">
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addNewSession" class="btn btn-custom btn-sm float-right">
                        <span data-toggle="tooltip" title="{{ __('Add Session') }}">
                            <i class="ti-plus"></i>
                        </span>
                    </a>
                    @include('university.program.modals.session')

                    <a href="javascript:void(0);" data-toggle="modal" data-target="#removeSession" class="btn btn-danger btn-sm float-right m-r-10">
                        <span data-toggle="tooltip" title="{{ __('Remove Session') }}">
                            <i class="ti-close"></i>
                        </span>
                    </a>
                    @include('university.program.modals.remove_session')
                </div>
            </div>
            {{-- Session close --}}

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
                    @include('university.program.modals.pricing')
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
                    @include('university.program.modals.feature')

                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programFeatureRemove" class="btn btn-danger btn-sm float-right m-r-10">
                        <span data-toggle="tooltip" title="{{ __('Remove Feature') }}">
                            <i class="ti-close"></i>
                        </span>
                    </a>
                    @include('university.program.modals.remove_feature')
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
                        @php
                            $languageTests = $program->languageTests()->withPivot(['band', 'individual', 'details'])->get();
                        @endphp
                        @foreach ($languageTests as $lang)
                        <li>
                            <i class="feather icon-feather p-r-5 text-ucap font-16"></i>
                            <span class="text-capitalize">{{ $lang->name }} <sup>[ {{ __('Min Score') }} {{ $lang->pivot->band }} ]</sup></span>
                            @if($lang->pivot->individual == true)
                            <ul>
                                <li style="font-size: 12px; ">{{ $lang->pivot->details }}</li>
                            </ul>
                            @endif
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
                    @include('university.program.modals.add_language')

                    <a href="javascript:void(0);" data-toggle="modal" data-target="#programlanguageRemove" class="btn btn-danger btn-sm float-right m-r-10">
                        <span data-toggle="tooltip" title="{{ __('Remove Language Test') }}">
                            <i class="ti-close"></i>
                        </span>
                    </a>
                    @include('university.program.modals.remove_language')
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
        $(document).ready(function(){

            // Edit basic information
            $('#editProgram').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                let level = '{{ $program->level }}';
                modal.find('#programLevel option').each(function(){
                    if($(this).val()==level){ // EDITED THIS LINE
                        $(this).attr("selected","selected");
                    }
                });
            });

            // Edit basic Detailsinformation
            $('#programDetails').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var modal = $(this);
                let internship = '{{ $program->internship }}';
                modal.find('#internship option').each(function(){
                    if($(this).val()==internship){ // EDITED THIS LINE
                        $(this).attr("selected","selected");
                    }
                });

                let scholarship = '{{ $program->scholarship }}';
                modal.find('#scholarship option').each(function(){
                    if($(this).val()==scholarship){ // EDITED THIS LINE
                        $(this).attr("selected","selected");
                    }
                });

                let attendance_type = '{{ $program->attendance_type }}';
                modal.find('#attendance_type option').each(function(){
                    if($(this).val()==attendance_type){ // EDITED THIS LINE
                        $(this).attr("selected","selected");
                    }
                });
            });
        });
    </script>


    <script>
        $(document).ready(function(){
            $('#individualCheckbox').click(function(){
                var inputs = $('#individualInputs');
                var input = $('.individual-input');
                if($(this).prop("checked") == true && $(this).is(":checked")){
                    inputs.removeClass('d-none');
                    input.attr('required', true);
                }
                else if($(this).prop("checked") == false && $(this).is(":not(:checked)")){
                    inputs.addClass('d-none');
                    input.removeAttr('required');
                }
            });
        });
    </script>

    {{-- This section for the add and edit curriculum start --}}
    <script>

        function deleteSubject(that){
            var index = $(that).parent().parent().parent();
            index.remove();
        }

        function addSubject(id = null, name = '', code = '', credit = null){
            if(id == null) id = '_id_'+Date.now();
            var subject = `<div class="col-md-12 form-group">
                <div class="input-group">
                    <input type="text" class="form-control program-subject-name" value="`+name+`" name="subjects[`+id+`][name]" placeholder="Subject *" required>
                    <input type="text" class="form-control program-subject-code" value="`+code+`" name="subjects[`+id+`][code]" placeholder="Code *" required>
                    <input type="number" min="0" max="5" step="0.1" class="form-control program-subject-credit" value="`+credit+`" name="subjects[`+id+`][credit]" placeholder="Credit *" required>
                    <div class="input-group-append program-subject-delete">
                        <button class="btn btn-cutom bg-ucap" onclick="return deleteSubject(this);" data-toggle="tooltip" data-title="Delete" type="button">
                            <i class="fa fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>`;
            return subject;
        }

        $(document).ready(function(){

            $('.add_subject').click(function(){
                var input = addSubject();
                $('.subjects').append(input);
            });
            $('.edit_add_subject').click(function(){
                var input = addSubject();
                $('.edit_subjects').append(input);
            });

            $('#programCurriculumEdit').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('todo');
                var modal = $(this);
                modal.find('#edit_curriculum_id').val(data.id);
                modal.find('#edit_semester_no').val(data.semester_no);
                modal.find('#edit_semester_title').val(data.title);
                $('.edit_subjects').empty();
                data.courses.forEach(course => {
                    var subject = addSubject(course.id, course.name, course.code, course.credit);
                    $('.edit_subjects').append(subject);
                });
            });
        });
    </script>
    {{-- This section for the add and edit curriculum close --}}
@endsection
