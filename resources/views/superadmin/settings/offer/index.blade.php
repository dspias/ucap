@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('All Offers'))

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
        .input-group-append .input-group-text {
            border: 1px solid #d4d8de;
            background: #ffffff;
            color: #dddddd;
            border-left: 0px solid transparent;
            padding: 0.275rem .75rem;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('All Offers') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Settings') }}</li>
    <li class="breadcrumb-item">{{ __('Offers') }}</li>
    <li class="breadcrumb-item active">{{ __('All Offers') }}</li>
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
                <div class="card-header">
                    <h4 class="card-title float-left">{{ __('All Offers') }}</h4>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#addNewOffer" class="btn btn-outline-dark btn-sm float-right">{{ __('Add New') }}</a>
                    @include('superadmin.settings.offer.modals.create')
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">{{ __('#') }}</th>
                                    <th class="text-center">{{ __('Discount') }}</th>
                                    <th class="text-center">{{ __('Min Apply') }}</th>
                                    <th class="text-center">{{ __('Created At') }}</th>
                                    <th class="text-center">{{ __('Status') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="text-center">{{ '01' }}</td>
                                    <td class="text-center">{{ '100' }}</td> {{-- Amount / Percent --}}
                                    <td class="text-center">{{ '3' }}</td>
                                    <td class="text-center">{{ '12_12_2021' }}</td>
                                    <td class="text-center">{{ 'status' }}</td>
                                    <td class="text-center">
                                        <div class="btn-group mr-2">
                                            <div class="dropdown">
                                                <button class="btn btn-round btn-outline-dark" type="button" id="btn_id_no_01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal-"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btn_id_no_01">
                                                    <a href="#" class="dropdown-item confirm" confirm="{{ __('Are you sure want to Activate This Offer?') }}">
                                                        <i class="fa fa-check text-success"></i> {{ __('Active') }}
                                                    </a>
                                                    <a href="#" class="dropdown-item confirm" confirm="{{ __('Are you sure want to Deactivate This Offer?') }}">
                                                        <i class="fa fa-ban text-danger"></i> {{ __('Inactive') }}
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
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
        "use strict";
        $(document).ready(function() {
            var discountType = $(".discount_type");
            var inAmount = $('#inAmount');
            var inPercent = $('#inPercent');

            $(discountType).click(function () {
                if ($(this).val() == "amount") {
                    inAmount.removeClass('d-none');
                    inPercent.addClass('d-none');
                } else if ($(this).val() == "percent") {
                    inPercent.removeClass('d-none');
                    inAmount.addClass('d-none');
                }
            });
        });
    </script>
@endsection
