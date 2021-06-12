@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Payments History'))

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
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Payments History') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Finance') }}</li>
    <li class="breadcrumb-item">{{ __('Payments') }}</li>
    <li class="breadcrumb-item active">{{ __('Payments History') }}</li>
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
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-bordered table-responsive-sm">
                        <thead>
                            <tr>
                                <th class="text-center">{{ __('#') }}</th>
                                <th class="text-center">{{ __('Invoice ID') }}</th>
                                <th class="text-center">{{ __('Paid Amount') }}</th>
                                <th class="text-center">{{ __('Requested At') }}</th>
                                <th class="text-center">{{ __('Paid At') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($payments as $sl => $payment) --}}
                                <tr data-href="{{ route('university.finance.details', ['invoice_id' => 1]) }}">
                                    <td class="text-center">{{ 'serial($sl)' }}</td>
                                    <td class="text-ucap text-bold text-center">{{ 'UCAPINV00000001' }}</td>
                                    <td class="text-center">{{ '$200.59' }}</td>
                                    <td class="text-center">{{ '12_12_2021' }}</td>
                                    <td class="text-center">{{ '12_12_2021' }}</td>
                                </tr>
                            {{-- @endforeach --}}
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
            $('#dataTable').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
