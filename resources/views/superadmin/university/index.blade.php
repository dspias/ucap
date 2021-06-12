@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Universities'))

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
    <b class="text-uppercase">{{ __('All Universities') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Universities') }}</li>
    <li class="breadcrumb-item active">{{ __('All Universities') }}</li>
@endsection


@section('action')
    <a class="btn btn-custom bg-ucap" href="{{ route('superadmin.university.create') }}">
        <i class="feather icon-plus mr-1"></i>
        {{ __('Add New University') }}
    </a>
@endsection



@section('content')

<!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('#') }}</th>
                                    <th class="text-center">{{ __('Logo') }}</th>
                                    <th class="text-center">{{ __('Name') }}</th>
                                    <th class="text-center">{{ __('Country') }}</th>
                                    <th class="text-center">{{ __('Representative') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($universities as $sl => $data)
                                <tr>
                                    <td class="text-center">{{ serial($sl) }}</td>
                                    <td class="text-center">
                                        @if(!is_null($url = has_media($data->university, 'logo', 'thumb')))
                                        <img src="{{ show_image($url) }}" width="40" class="img-responsive rounded img-fluid">
                                        @else
                                        <img src="{{ asset('assets/images/users/men.svg') }}" width="40" class="img-responsive rounded img-fluid">
                                        @endif
                                    </td>
                                    <td class="text-center">{{ $data->name }}</td>
                                    <td class="text-center">{{ optional(optional(optional(optional($data->university)->city)->state)->country)->name }}</td>
                                    <td class="text-center">{{ optional($data->universityRepresentatives)->count() }}</td>
                                    <td class="text-center">{!! get_status($data->status) !!}</td>
                                    <td class="text-center">
                                        <div class="btn-group mr-2">
                                            <div class="dropdown">
                                                <button class="btn btn-round btn-outline-dark" type="button" id="btn_id_no_01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal-"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btn_id_no_01">
                                                    @if($data->status == 1)
                                                    <a class="dropdown-item text-danger confirm" confirm="Are You sure to inactive this university?" href="{{ route('superadmin.university.change_status', [$data->id]) }}">
                                                        <i class="feather icon-x text-danger"></i> {{ __('Inactive') }}
                                                    </a>
                                                    @else
                                                    <a class="dropdown-item text-success confirm" confirm="Are You sure to active this university?" href="{{ route('superadmin.university.change_status', [$data->id]) }}">
                                                        <i class="feather icon-check text-success"></i> {{ __('Active') }}
                                                    </a>
                                                    @endif
                                                    <a class="dropdown-item" href="{{ route('superadmin.university.edit', [$data->id]) }}">
                                                        <i class="feather icon-edit-2"></i> {{ __('Edit') }}
                                                    </a>
                                                    <a class="dropdown-item" href="{{ route('superadmin.university.show', ['page' => 'all', 'id' => $data->id]) }}">
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
