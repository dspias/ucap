@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Faculty | Details'))

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
    </style>
@endsection


@section('page_name')
@php
    $status = ($faculty->status == true) ? '<span class="badge badge-success">Active</span>' : '<span class="badge badge-danger">Inactive</span>';
@endphp
    <b class="text-capitalize">
        {{ $faculty->name }}   {!! $status !!}
    </b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Faculties') }}</li>
    <li class="breadcrumb-item">
        @if ($page == 'all')
            <a href="{{ route('university.faculty.all') }}">{{ __($page_title) }}</a>
        @elseif ($page == 'active')
            <a href="{{ route('university.faculty.active') }}">{{ __($page_title) }}</a>
        @else
            <a href="{{ route('university.faculty.inactive') }}">{{ __($page_title) }}</a>
        @endif
    </li>
    <li class="breadcrumb-item active">{{ __('Details') }}</li>
@endsection


@section('action')
    <a href="{{ url()->previous() }}" class="btn btn-custom">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
    <a href="javascript:void(0);" data-toggle="modal" data-target="#editFaculty" class="btn btn-custom bg-ucap">
        <i class="ti-pencil mr-1"></i>
        {{ __('Edit') }}
    </a>
    @include('university.faculty.modals.edit_faculty')
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 class="card-title float-left">{{ __('Programs of ') }} {{ $faculty->name }}</h4>
                <a href="{{ route('university.program.create') }}" class="btn btn-custom bg-ucap btn-sm float-right text-bold">{{ __('Assign New') }}</a>

                @include('superadmin.university.modals.create_program')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="programTable" class="table table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('#') }}</th>
                                <th class="text-center">{{ __('ID') }}</th>
                                <th class="text-center">{{ __('Program Name') }}</th>
                                <th class="text-center">{{ __('Total Application') }}</th>
                                <th class="text-center">{{ __('Status') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faculty->programs as $sl => $program)
                            <tr data-href="{{ route('university.program.edit', ['id' => $program->id, 'page' => 'all']) }}">
                                <td class="text-center">{{ $sl+1 }}</td>
                                <td class="text-center">{{ $program->pid }}</td>
                                <td class="text-ucap text-bold text-center">{{ $program->name }}</td>
                                <td class="text-center">{{ $program->applied->count() }}</td>
                                <td class="text-center">{!! get_status($program->status) !!}</td>
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
            $('#programTable').DataTable({
                responsive: true
            });

            // edit faculty

        });
    </script>
@endsection
