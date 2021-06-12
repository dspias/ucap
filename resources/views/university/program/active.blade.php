@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Programs'))

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
    <b class="text-uppercase">{{ __('All Programs') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Programs') }}</li>
    <li class="breadcrumb-item active">{{ __('All Programs') }}</li>
@endsection


@section('action')
    <a class="btn btn-custom bg-ucap" href="{{ route('university.program.create') }}">
        <i class="feather icon-plus mr-1"></i>
        {{ __('Add New Program') }}
    </a>
@endsection



@section('content')

<!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                {{-- <div class="card-header">
                    <h5 class="card-title float-left">{{ __('All Programs') }}</h5>
                    <a href="#" class="btn btn-outline-dark btn-sm float-right">{{ __('Add New') }}</a>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="programTable" class="table table-bordered table-responsive-sm">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('#') }}</th>
                                    <th class="text-center">{{ __('ID') }}</th>
                                    <th class="text-center">{{ __('Program Name') }}</th>
                                    <th class="text-center">{{ __('Total Application') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($programs as $sl => $program)
                                <tr>
                                    <td class="text-center">{{ $sl+1 }}</td>
                                    <td class="text-center">{{ $program->pid }}</td>
                                    <td class="text-ucap text-bold text-center">{{ $program->name }}</td>
                                    <td class="text-center">{{ $program->applied->count() }}</td>
                                    <td class="text-center">
                                        <div class="btn-group mr-2">
                                            <div class="dropdown">
                                                <button class="btn btn-round btn-outline-dark" type="button" id="btn_id_no_01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal-"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btn_id_no_01">
                                                    @if($program->status == 1)
                                                    <a class="dropdown-item text-danger confirm" confirm="Are You sure to inactive this program?" href="{{ route('university.program.change_status', [$program->id]) }}">
                                                        <i class="feather icon-x text-danger"></i> {{ __('Inactive') }}
                                                    </a>
                                                    @else
                                                    <a class="dropdown-item text-success confirm" confirm="Are You sure to active this program?" href="{{ route('university.program.change_status', [$program->id]) }}">
                                                        <i class="feather icon-check text-success"></i> {{ __('Active') }}
                                                    </a>
                                                    @endif
                                                    <a class="dropdown-item" href="{{ route('university.program.edit', ['page' => 'active', 'id' => $program->id]) }}">
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
