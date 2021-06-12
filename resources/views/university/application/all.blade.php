@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Applications'))

@section('css_links')
    {{--  External CSS  --}}
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
    .dropdown-menu{
        box-shadow: 0px 0px 30px 0px rgb(0 0 0 / 10%) !important;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('All Applications') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Application') }}</li>
    <li class="breadcrumb-item active">{{ __('All Applications') }}</li>
@endsection


@section('action')
    <button class="btn btn-custom" onClick="window.location.reload();">
        <i class="feather icon-refresh-cw mr-1"></i>
        {{ __('Refresh') }}
    </button>
@endsection



@section('content')

<!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                {{-- <div class="card-header">
                    <h5 class="card-title float-left">{{ __('All Applications') }}</h5>
                    <a href="#" class="btn btn-outline-dark btn-sm float-right">{{ __('Add New') }}</a>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-bordered">
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
                                        <a href="{{ route('university.application.student', ['page' => 'all', 'student_id' => decbin($data->student_id)]) }}" target="_blank" class="text-bold text-dark">{{ optional($data->student)->name }}</a>
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
                                                    <a class="dropdown-item" href="{{ route('university.application.show', ['page' => 'all', 'id' => decbin($data->id)]) }}">
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
        <!-- End col -->
    </div>
<!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
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
    </script>
@endsection
