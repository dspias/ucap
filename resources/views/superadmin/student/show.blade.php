@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Students'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
        .card .card-body .card{
            border: 1px solid #f6f6f6;
        }
        .university-admin-avatar{
            height: 150px;
            width: 150px;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ optional($student->student)->first_name. ' ' .optional($student->student)->middle_name. ' ' .optional($student->student)->last_name  }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('superadmin.student.index') }}" class="text-dark text-bold">{{ __('Students') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Student Details') }}</li>
@endsection


@section('action')
    <a href="{{ url()->previous() }}" class="btn btn-custom">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
    <a href="{{ route('superadmin.student.ban', ['student_id' => decbin($student->id)]) }}" class="btn btn-custom bg-ucap confirm" confirm="Are you sure want to Ban this Student?">
        <i class="fa fa-ban mr-1"></i>
        {{ __('Ban') }}
    </a>
    <a href="#" target="_blank" class="btn btn-custom-outline" data-toggle="tooltip" data-title="{{ __('Live chat with this Student?') }}">
        <i class="feather icon-message-circle mr-1"></i>
        {{ __('Live Chat') }}
    </a>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-4">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="profilebox text-center">

                    @if(!is_null($url = has_media($student->student, 'avatar', 'thumb')))
                    <img src="{{ show_image($url) }}" class="img-fluid mb-3 rounded-circle university-admin-avatar" height="150px" width="150px" alt="profile">
                    @else
                    <img src="https://via.placeholder.com/500x500?text=No+Avatar+Found" class="img-fluid mb-3 rounded-circle university-admin-avatar" height="150px" width="150px" alt="profile">
                    @endif

                    <div class="profilename">
                        <h4 class="text-ucap text-bold">{{ $student->name }}</h4>
                        <h6 class="text-dark">{{ optional($student->student)->country }}</h6>
                    </div>
                    <div class="button-list">
                        <a href="Tel:{{ optional($student->student)->phone }}" data-toggle="tooltip" data-title="{{ __('Mobile') }}" class="btn btn-custom font-14">
                            <i class="fa fa-phone"></i>
                        </a>
                        <a href="mailto:{{ $student->email }}" data-toggle="tooltip" data-title="{{ __('Email') }}" class="btn btn-custom font-14">
                            <i class="fa fa-envelope"></i>
                        </a>
                        <a href="{{ optional($student->student)->facebook }}" data-toggle="tooltip" data-title="{{ __('Facebook') }}" class="btn btn-custom font-14">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://wa.me/{{ optional($student->student)->whatsapp }}" data-toggle="tooltip" data-title="{{ __('Whatsapp') }}" class="btn btn-custom font-14">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                        <a href="https://telegram.me/{{ optional($student->student)->telegram }}" data-toggle="tooltip" data-title="{{ __('Telegram') }}" class="btn btn-custom font-14">
                            <i class="fa fa-telegram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->

    <!-- Start col -->
    <div class="col-lg-8">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-center" style="width: 30%;">
                                    {{ __('Full Name') }}
                                </th>
                                <td class="text-center" style="width: 60%;">
                                    {{ $student->name }}
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">
                                    {{ __('Gender') }}
                                </th>
                                <td class="text-center" style="width: 60%;">
                                    {{ ucfirst(optional($student->student)->gender) }}
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">
                                    {{ __('Birthdate') }}
                                </th>
                                <td class="text-center" style="width: 60%;">
                                    {{ get_date(optional($student->student)->dob) }}
                                            <sup class="text-ucap">{{ __('('. get_age(optional($student->student)->dob).' Years)') }}</sup>
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">
                                    {{ __('Native Language') }}
                                </th>
                                <td class="text-center" id="show_native" style="width: 60%;" >
                                    {{ __('native language') }}
                                </td>
                                <div style="display: none;" id="native_language">
                                    @include('student.settings.apart.languages')
                                </div>
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">
                                    {{ __('Email') }}
                                </th>
                                <td class="text-center" style="width: 60%;">
                                    {{ $student->email }}
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">
                                    {{ __('Mobile Number') }}
                                </th>
                                <td class="text-center" style="width: 60%;">
                                    {{ optional($student->student)->phone }}
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">
                                    {{ __('Country') }}
                                </th>
                                <td class="text-center" style="width: 60%;">
                                    {{ optional($student->student)->country }}
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">
                                    {{ __('Province') }}
                                </th>
                                <td class="text-center" style="width: 60%;">
                                    {{ optional($student->student)->state }}
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">
                                    {{ __('City') }}
                                </th>
                                <td class="text-center" style="width: 60%;">
                                    {{ optional($student->student)->city }}
                                </td>
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">
                                    {{ __('Address') }}
                                </th>
                                <td class="text-center" style="width: 60%;">
                                    {{ optional($student->student)->address }}
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
</div>


<div class="row m-b-30">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title float-left mb-0 m-b-0">{{ __('All Documents') }}</h5>
                <a href="#" class="btn btn-custom btn-sm float-right confirm" confirm="{{ __('Are you sure want to Download All Documents?') }}">
                    <i class="ti-download"></i>
                    {{ __('Download All') }}
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-center" style="width: 30%;">{{ __('Passport Size Photo') }}</th>

                                @if (!is_null(has_media($student->student, 'avatar')))
                                <td class="text-center" style="width: 60%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'avatar']) }}" class="text-ucap text-bold">{{ optional(optional($student->student)->getFirstMedia('avatar'))->name }}</a>
                                </td>
                                <td class="text-center" style="width: 10%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'avatar']) }}" class="btn btn-custom btn-sm text-bold">
                                        <i class="ti-download"></i>
                                    </a>
                                </td>
                                @else
                                <td class="text-center" style="width: 70%;" colspan="2">
                                    {{ __('File not found') }}
                                </td>
                                @endif
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">{{ __('NID / Birth Certificate') }}</th>

                                @if (!is_null(has_media($student->student, 'nid_birth')))
                                <td class="text-center" style="width: 60%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'nid_birth']) }}" class="text-ucap text-bold">{{ optional(optional($student->student)->getFirstMedia('nid_birth'))->name }}</a>
                                </td>
                                <td class="text-center" style="width: 10%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'nid_birth']) }}" class="btn btn-custom btn-sm text-bold">
                                        <i class="ti-download"></i>
                                    </a>
                                </td>
                                @else
                                <td class="text-center" style="width: 70%;" colspan="2">
                                    {{ __('File not found') }}
                                </td>
                                @endif
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">{{ __('Passport') }}</th>

                                @if (!is_null(has_media($student->student, 'passport')))
                                <td class="text-center" style="width: 60%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'passport']) }}" class="text-ucap text-bold">{{ optional(optional($student->student)->getFirstMedia('passport'))->name }}</a>
                                </td>
                                <td class="text-center" style="width: 10%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'passport']) }}" class="btn btn-custom btn-sm text-bold">
                                        <i class="ti-download"></i>
                                    </a>
                                </td>
                                @else
                                <td class="text-center" style="width: 70%;"  colspan="2">
                                    {{ __('File not found') }}
                                </td>
                                @endif
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">{{ __('Language Test') }}</th>

                                @if (!is_null(has_media($student->student, 'language_certificate')))
                                <td class="text-center" style="width: 60%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'language_certificate']) }}" class="text-ucap text-bold">{{ optional(optional($student->student)->getFirstMedia('language_certificate'))->name }}</a>
                                </td>
                                <td class="text-center" style="width: 10%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'language_certificate']) }}" class="btn btn-custom btn-sm text-bold">
                                        <i class="ti-download"></i>
                                    </a>
                                </td>
                                @else
                                <td class="text-center" style="width: 70%;"  colspan="2">
                                    {{ __('File not found') }}
                                </td>
                                @endif
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">{{ __('Declaration/Signature') }}</th>

                                @if (!is_null(has_media($student->student, 'signature')))
                                <td class="text-center" style="width: 60%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'signature']) }}" class="text-ucap text-bold">{{ optional(optional($student->student)->getFirstMedia('signature'))->name }}</a>
                                </td>
                                <td class="text-center" style="width: 10%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'signature']) }}" class="btn btn-custom btn-sm text-bold">
                                        <i class="ti-download"></i>
                                    </a>
                                </td>
                                @else
                                <td class="text-center" style="width: 70%;"  colspan="2">
                                    {{ __('File not found') }}
                                </td>
                                @endif
                            </tr>

                            <tr>
                                <th class="text-center" style="width: 30%;">{{ __('Additional Docs') }}</th>

                                @if (!is_null(has_media($student->student, 'additionals')))
                                <td class="text-center" style="width: 60%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'additionals']) }}" class="text-ucap text-bold">{{ optional(optional($student->student)->getFirstMedia('additionals'))->name }}</a>
                                </td>
                                <td class="text-center" style="width: 10%;">
                                    <a href="{{ route('superadmin.student.download', ['id' => $student->id, 'type' => 'additionals']) }}" class="btn btn-custom btn-sm text-bold">
                                        <i class="ti-download"></i>
                                    </a>
                                </td>
                                @else
                                <td class="text-center" style="width: 70%;"  colspan="2">
                                    {{ __('File not found') }}
                                </td>
                                @endif
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row m-b-30">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title float-left mb-0 m-b-0">{{ __('Educational Qualifications') }}</h5>
            </div>
            <div class="card-body">
                <div class="card">
                    <div class="card-header mb-0" style="margin-bottom: 0px;">
                        <h5 class="text-center">{{ 'Education Level' }}</h5>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            @foreach ($educations as $item => $education)
                            <div class="col-md-6">
                                <table class="table table-responsive-sm table-bordered mb-0">
                                    <tbody>
                                        <tr>
                                            <th scope="row" class="text-center">{{ __('Education Level') }}</th>
                                            <td scope="row" class="text-center">
                                                <span class="text-bold text-capitalize">{{ $education->level }}</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-center">{{ __('Education Field') }}</th>
                                            <td scope="row" class="text-center">
                                                <span class="text-bold text-capitalize">{{ $education->field }}</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-center">{{ __('Major Subject') }}</th>
                                            <td scope="row" class="text-center">
                                                <span class="text-bold text-capitalize">{{ $education->major_subject }}</span>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th scope="row" class="text-center">{{ __('Institute') }}</th>
                                            <td scope="row" class="text-center">
                                                <span class="text-bold text-capitalize">{{ $education->institute }}</span>
                                            </td>
                                        </tr>
                                        @if (!is_null(has_media($education, 'document')))
                                        <tr>
                                            <th scope="row" class="text-center">{{ __('Documents') }}</th>
                                            <td scope="row" class="text-center">
                                                <a href="{{ route('superadmin.student.education_download', ['model_id' => $education->id]) }}" class="btn btn-custom btn-sm text-bold">
                                                    <i class="ti-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
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
        $(document).ready(function(){
            var selected = '{{ optional($student->student)->language }}';
            var lang = null;
            var options = $('#native_language').find('option').each(function(){
                if($(this).val()==selected){ // EDITED THIS LINE
                        lang = $(this).html();
                    }
            });
            $('#show_native').html(lang);
        });
    </script>
@endsection
