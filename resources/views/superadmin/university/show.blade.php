@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __($page_title. ' | Details'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
        .select2-dropdown {
            background-color: #ffffff;
            border: none;
            border-radius: 3px;
            box-shadow: 0px 0px 5px 2px rgb(0 0 0 / 15%) !important;
        }
        .select2-container--default .select2-selection--single {
            border: 1px solid #d4d4d4;
            height: 36px;
        }
        .select2-container .select2-selection--single .select2-selection__rendered {
            line-height: 35px;
        }

        .card.university-card .card-header .profilebox img {
            /* position: absolute; */
            top: 80px;
            /* left: 27%; */
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
        }
        .card.university-card .button-list .btn {
            margin-right: 0px;
            margin-bottom: 5px;
        }

        .cover-photo {
            height: 106px;
            background-size: cover;
            background-position: center;
        }
        .university-logo{
            height: 100px;
            width: 100px;
        }
        .university-admin-avatar{
            height: 150px;
            width: 150px;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-capitalize">{{ $university->name }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Universities') }}</li>
    <li class="breadcrumb-item">
        @if ($page == 'all')
            <a href="{{ route('superadmin.university.index') }}">{{ __($page_title) }}</a>
        @elseif ($page == 'active')
            <a href="{{ route('superadmin.university.active') }}">{{ __($page_title) }}</a>
        @else
            <a href="{{ route('superadmin.university.inactive') }}">{{ __($page_title) }}</a>
        @endif
    </li>
    <li class="breadcrumb-item active">{{ __('Details') }}</li>
@endsection


@section('action')
    @php
        if ($page == 'all')
            $url = 'superadmin.university.index';
        elseif ($page == 'active')
            $url = 'superadmin.university.active';
        else
            $url = 'superadmin.university.inactive';
    @endphp
    <a href="{{ url()->previous() }}" class="btn btn-custom">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
    <a href="{{ route('superadmin.university.edit', [$university->id]) }}" class="btn btn-custom bg-ucap confirm" confirm="Are you sure want to Edit this University?">
        <i class="ti-pencil mr-1"></i>
        {{ __('Edit') }}
    </a>
    <a href="{{ route('guest.university.show', ['id' => decbin($university->id), 'name' => get_name($university->name)]) }}" target="_blank" class="btn btn-custom-outline" data-toggle="tooltip" data-title="{{ __('See preview in live website') }}">
        <i class="ti-eye mr-1"></i>
        {{ __('Live') }}
    </a>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <div class="col-md-4">
        <div class="card university-card m-b-30">
            <div class="card-header p-0">
                @if(!is_null($url = has_media($university->university, 'cover')))
                    <div class="cover-photo" style="background-image: url({{ show_image($url) }});"></div>
                @else
                    <div class="cover-photo" style="background-image: url(https://via.placeholder.com/1280x500?text=No+Cover+Found);"></div>
                @endif

                <div class="profilebox text-center">
                    @if(!is_null($url = has_media($university->university, 'logo')))
                    <img src="{{ show_image($url) }}" class="img-fluid img-thumbnail mb-3 rounded-circle university-logo" width="100px" alt="profile">
                    @else
                    <img src="https://via.placeholder.com/500x500?text=No+Avatar+Found" class="img-fluid img-thumbnail mb-3 rounded-circle university-logo" width="100px" alt="profile">
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="profilebox p-t-50 text-center">
                    <div class="profilename">
                        <h4 class="text-ucap text-bold">{{ $university->name }}</h4>
                        <h6 class="text-dark">{{ optional($university->university)->address }}</h6>
                    </div>
                    <div class="button-list">
                        <a href="{{ optional($university->university)->website }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Website') }}" class="btn btn-custom font-10">
                            <i class="fa fa-feed"></i>
                        </a>
                        <a href="Tel:{{ optional($university->university)->phone }}" data-toggle="tooltip" data-title="{{ __('Mobile') }}" class="btn btn-custom font-10">
                            <i class="fa fa-phone"></i>
                        </a>
                        <a href="mailto:{{ optional($university->university)->email }}" data-toggle="tooltip" data-title="{{ __('Email') }}" class="btn btn-custom font-10">
                            <i class="fa fa-envelope"></i>
                        </a>
                        <a href="{{ optional($university->university)->facebook }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Facebook') }}" class="btn btn-custom font-10">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="{{ optional($university->university)->twitter }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Twitter') }}" class="btn btn-custom font-10">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="{{ optional($university->university)->linkedin }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Linkedin') }}" class="btn btn-custom font-10">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="{{ optional($university->university)->instagram }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Instagram') }}" class="btn btn-custom font-10">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/{{ optional($university->university)->whatsapp }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Whatsapp') }}" class="btn btn-custom font-10">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                        {{-- <a href="https://telegram.me/{{ optional($university->university)->telegram }}" data-toggle="tooltip" data-title="{{ __('Telegram') }}" class="btn btn-custom font-10">
                            <i class="fa fa-telegram"></i>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>


        <div class="card m-b-30">
            <div class="card-body">
                <div class="profilebox text-center">
                    @if(!is_null($url = has_media($university->university, 'admin')))
                        <img src="{{ show_image($url) }}" class="img-fluid mb-3 rounded-circle university-admin-avatar" height="150px" width="150px" alt="profile">
                    @else
                        <img src="https://via.placeholder.com/500x500?text=No+Avatar+Found" class="img-fluid mb-3 rounded-circle university-admin-avatar" height="150px" width="150px" alt="profile">
                    @endif

                    <div class="profilename">
                        <h4 class="text-ucap text-bold">{{ 'Admin Name' }}</h4>
                        <h6 class="text-dark">{{ optional($university->university)->admin_name }}</h6>
                    </div>
                    <div class="button-list">
                        <a href="Tel:{{ optional($university->university)->admin_mobile }}" data-toggle="tooltip" data-title="{{ __('Mobile') }}" class="btn btn-custom font-14">
                            <i class="fa fa-phone"></i>
                        </a>
                        <a href="mailto:{{ optional($university->university)->admin_email }}" data-toggle="tooltip" data-title="{{ __('Email') }}" class="btn btn-custom font-14">
                            <i class="fa fa-envelope"></i>
                        </a>
                        <a href="{{ optional($university->university)->admin_facebook }}" data-toggle="tooltip" data-title="{{ __('Facebook') }}" class="btn btn-custom font-14">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://wa.me/{{ optional($university->university)->admin_whatsapp }}" data-toggle="tooltip" data-title="{{ __('Whatsapp') }}" class="btn btn-custom font-14">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                        <a href="https://telegram.me/{{ optional($university->university)->admin_telegram }}" data-toggle="tooltip" data-title="{{ __('Telegram') }}" class="btn btn-custom font-14">
                            <i class="fa fa-telegram"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-left text-bold">{{ __('University Name') }}</th>
                                <td class="text-right text-ucap text-bold">{{ $university->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('University Email') }}</th>
                                <td class="text-right">{{ optional($university->university)->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('University Phone') }}</th>
                                <td class="text-right">{{ optional($university->university)->phone }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Country') }}</th>
                                <td class="text-right">{{ optional(optional(optional(optional($university->university)->city)->state)->country)->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Province') }}</th>
                                <td class="text-right">{{  optional(optional(optional($university->university)->city)->state)->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('City') }}</th>
                                <td class="text-right">{{ optional(optional($university->university)->city)->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Postal  Code') }}</th>
                                <td class="text-right">{{ optional($university->university)->post_code }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Address') }}</th>
                                <td class="text-right">{{ optional($university->university)->address }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Assigned At') }}</th>
                                <td class="text-right">{{ get_date($university->created_at, 'd M, Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-left text-bold">{{ __('Admin Name') }}</th>
                                <td class="text-right text-ucap text-bold">{{ optional($university->university)->admin_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Admin Gender') }}</th>
                                <td class="text-right">{{ optional($university->university)->gender }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Admin Email') }}</th>
                                <td class="text-right">{{ optional($university->university)->admin_email }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Admin Phone') }}</th>
                                <td class="text-right">{{ optional($university->university)->admin_mobile }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 class="card-title float-left">{{ __('Faculties') }}</h4>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#createFaculty" class="btn btn-custom bg-ucap btn-sm float-right text-bold">{{ __('Assign New') }}</a>

                @include('superadmin.university.modals.create_faculty')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="facultyTable" class="table table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('#') }}</th>
                                <th class="text-center">{{ __('Name') }}</th>
                                {{-- <th class="text-center">{{ __('University') }}</th> --}}
                                <th class="text-center">{{ __('Total Program') }}</th>
                                <th class="text-center">{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($university->faculties as $key =>  $faculty)
                            <tr data-href="{{ route('superadmin.university.faculty.show', ['uni_id' => decbin($university->id), 'faculty_id' => decbin($faculty->id)]) }}">
                                <td class="text-center">{{ $key+1 }}</td>
                                <td class="text-center">{{ $faculty->name }}</td>
                                {{-- <td class="text-center">{{ $faculty->university->name }}</td> --}}
                                <td class="text-center">{{ $faculty->programs->count() }}</td>
                                <td class="text-center">{!! get_status($faculty->status) !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 class="card-title float-left">{{ __('Representatives') }}</h4>
                <a href="#" class="btn btn-custom bg-ucap btn-sm float-right text-bold">{{ __('Assign New') }}</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="representativeTable" class="table table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('#') }}</th>
                                <th class="text-center">{{ __('Name') }}</th>
                                <th class="text-center">{{ __('Email') }}</th>
                                <th class="text-center">{{ __('Mobile') }}</th>
                                <th class="text-center">{{ __('Native Language') }}</th>
                                <th class="text-center">{{ __('Assigned At') }}</th>
                                <th class="text-center">{{ __('Tasks') }}</th>
                                <th class="text-center">{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($university->universityRepresentatives as $sl =>  $rep)
                            <tr data-href="{{ route('superadmin.representative.show', ['id' => optional($rep->user)->id, 'page' => 'all']) }}">
                                <td class="text-center">{{ $sl+1 }}</td>
                                <td class="text-ucap text-bold text-center">{{ optional($rep->user)->name }}</td>
                                <td class="text-center">{{ optional($rep->user)->email }}</td>
                                <td class="text-center">{{ $rep->phone }}</td>
                                <td class="text-center">{{ native_lang($rep->language) }}</td>
                                <td class="text-center">{{ get_date(optional($rep->user)->created_at, 'd M, Y') }}</td>
                                <td class="text-center">{{ optional(optional($rep->user)->assignTasks)->count() }}</td>
                                <td class="text-center">{!! get_status(optional($rep->user)->created_at) !!}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 class="card-title float-left">{{ __('Applications') }}</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="applicationTable" class="table table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('#') }}</th>
                                <th>{{ __('Application ID') }}</th>
                                <th>{{ __('Student') }}</th>
                                <th>{{ __('Applied At') }}</th>
                                <th>{{ __('Total Programs') }}</th>
                                <th>{{ __('Status') }}</th>
                                <th class="text-center">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($applications as $sl => $data)
                            <tr>
                                <td class="text-center">{{ serial($sl) }}</td>
                                <td class="text-bold text-ucap">{{ $data->aid }}</td>
                                <td>
                                    <a href="{{ route('superadmin.student.show', ['student_id' => decbin($data->student_id)]) }}" target="_blank" class="text-bold text-dark">{{ optional($data->student)->name }}</a>
                                </td>
                                <td>{{ get_date($data->created_at, 'd M, Y') }}</td>
                                <td>{{ $data->total_program }}</td>
                                <td>{!! application_status($data->status) !!}</td>
                                <td class="text-center">
                                    <div class="btn-group mr-2">
                                        <div class="dropdown">
                                            <button class="btn btn-round btn-outline-dark" type="button" id="btn_id_no_01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="feather icon-more-horizontal-"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="btn_id_no_01">
                                                {{-- <a class="dropdown-item" href="#">
                                                    <i class="feather icon-edit-2"></i> {{ __('Edit') }}
                                                </a> --}}
                                                <a class="dropdown-item" href="{{ route('superadmin.application.show', ['page' => 'all', 'id' => decbin($data->id), 'application_id' => $data->aid]) }}">
                                                    <i class="feather icon-info"></i> {{ __('Details') }}
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <!-- Datatable js -->
    <script src="{{ asset('assets/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/jszip.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/pdfmake.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/vfs_fonts.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.print.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/buttons.colVis.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-table-datatable.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $(document).ready(function() {
            /* -- Form Select - Select2 -- */
            $('.select2-single').select2();
            // $('.modal').removeAttr('tabindex'); // Working for modal
        });
    </script>

    <script>
        /*
        ---------------------------------------
            : Custom - Table Datatable js :
        ---------------------------------------
        */
        "use strict";
        $(document).ready(function() {
            /* -- Table - Datatable -- */
            $('#facultyTable, #representativeTable, #applicationTable').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
