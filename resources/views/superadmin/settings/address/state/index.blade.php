@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Provinces'))

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
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Provinces') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Settings') }}</li>
    <li class="breadcrumb-item">{{ __('Address') }}</li>
    <li class="breadcrumb-item active">{{ __('Provinces') }}</li>
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
                    <h5 class="card-title float-left">{{ __('All Available Provinces') }}</h5>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#createNewState" class="btn btn-outline-dark btn-sm float-right">{{ __('Add New') }}</a>

                    @include('superadmin.settings.address.state.modals.create_state')
                    @include('superadmin.settings.address.state.modals.update_state')
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Country') }}</th>
                                    <th>{{ __('Registerd At') }}</th>
                                    <th>{{ __('Cities') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($states as $sl => $state)
                                <tr>
                                    <td>{{ __($sl+1) }}</td>
                                    <td>{{ $state->name }}</td>
                                    <td class="text-bold">{{ optional($state->country)->name }}</td>
                                    <td>{{ get_date($state->created_at, 'd M, Y') }}</td>
                                    <td>{{ $state->cities()->whereStatus(true)->count() }}</td>
                                    <td>{!! get_status($state->status) !!}</td>
                                    <td class="text-center">
                                        <div class="btn-group mr-2">
                                            <div class="dropdown">
                                                <button class="btn btn-round btn-outline-dark" type="button" id="btn_id_no_01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal-"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btn_id_no_01">
                                                    @if($state->status == 1)
                                                    <a class="dropdown-item text-danger confirm" confirm="Are You sure to inactive this province?" href="{{ route('superadmin.settings.address.state.change_status', [$state->id]) }}">
                                                        <i class="feather icon-x text-danger"></i> {{ __('Inactive') }}
                                                    </a>
                                                    @else
                                                    <a class="dropdown-item text-success confirm" confirm="Are You sure to active this province?" href="{{ route('superadmin.settings.address.state.change_status', [$state->id]) }}">
                                                        <i class="feather icon-check text-success"></i> {{ __('Active') }}
                                                    </a>
                                                    @endif
                                                    <a href="javascript:void(0);" data-toggle="modal" data-todo="{{ $state }}" data-target="#updateState" class="dropdown-item">
                                                        <i class="feather icon-edit-2"></i> {{ __('Edit') }}
                                                    </a>
                                                    {{-- <a class="dropdown-item" href="#">
                                                        <i class="feather icon-info"></i> {{ __('Details') }}
                                                    </a> --}}
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
    <!-- Select2 js -->
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $(document).ready(function() {
            /* -- Form Select - Select2 -- */
            $('.select2-single').select2();
        });
    </script>
    <script>
        // Custom Script Here
        $(document).ready(function(){
            $('#updateState').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget); // Button that triggered the modal
                var data = button.data('todo'); // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
                var modal = $(this);
                modal.find('#update_country option').each(function(){
                    if($(this).val()==data.country.id){ // EDITED THIS LINE
                        $(this).attr("selected","selected");
                        modal.find('#select2-update_country-container').html(data.country.name);
                    }
                });
                modal.find('#state_id').val(data.id);
                modal.find('#update_state').val(data.name);
            });
        });
    </script>
@endsection
