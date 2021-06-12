@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Cities'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Responsive Datatable css -->
    <link href="{{ asset('assets/plugins/datatables/responsive.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Cities') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Settings') }}</li>
    <li class="breadcrumb-item">{{ __('Address') }}</li>
    <li class="breadcrumb-item active">{{ __('Cities') }}</li>
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
                    <h5 class="card-title float-left">{{ __('All Available Cities') }}</h5>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#createNewCity" class="btn btn-outline-dark btn-sm float-right">{{ __('Add New') }}</a>

                    @include('superadmin.settings.address.city.modals.create_city')
                    @include('superadmin.settings.address.city.modals.update_city')
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Province') }}</th>
                                    <th>{{ __('Country') }}</th>
                                    <th>{{ __('Registerd At') }}</th>
                                    <th>{{ __('Universities') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($cities as $sl => $city)
                                <tr>
                                    <td>{{ __($sl+1) }}</td>
                                    <td>{{ $city->name }}</td>
                                    <td>{{ optional($city->state)->name }}</td>
                                    <td>{{ optional(optional($city->state)->country)->name }}</td>
                                    <td>{{ get_date($city->created_at, 'd M, Y') }}</td>
                                    <td>{{ $city->universities->count() }}</td>
                                    <td>{!! get_status($city->status) !!}</td>
                                    <td class="text-center">
                                        <div class="btn-group mr-2">
                                            <div class="dropdown">
                                                <button class="btn btn-round btn-outline-dark" type="button" id="btn_id_no_01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal-"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btn_id_no_01">
                                                    @if($city->status == 1)
                                                    <a class="dropdown-item text-danger confirm" confirm="Are You sure to inactive this city?" href="{{ route('superadmin.settings.address.city.change_status', [$city->id]) }}">
                                                        <i class="feather icon-x text-danger"></i> {{ __('Inactive') }}
                                                    </a>
                                                    @else
                                                    <a class="dropdown-item text-success confirm" confirm="Are You sure to active this city?" href="{{ route('superadmin.settings.address.city.change_status', [$city->id]) }}">
                                                        <i class="feather icon-check text-success"></i> {{ __('Active') }}
                                                    </a>
                                                    @endif
                                                    <a href="javascript:void(0);" data-toggle="modal" data-todo="{{ $city }}" data-target="#updateCity" class="dropdown-item">
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
            var countries = JSON.parse('{!! json_encode($countries) !!}');
            $('#country').change(function(){
                var country_id = $('#country').val();
                var states = [];
                var selected_country = countries.find(country => country.id == country_id);
                if(typeof(selected_country) != 'undefined'){
                    var states = selected_country.states;
                }
                var options = '<option value="" aria-disabled="true">Select Province *</option>';
                states.forEach(state => {
                    options += '<option value="'+state.id+'" >'+state.name+'</option>';
                });
                $('#state').empty().append(options);
            });
            $('#update_country').change(function(){
                updatecityState();
            });

            $('#updateCity').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('todo');

                var modal = $(this);
                modal.find('#update_country option').each(function(){
                    if($(this).val()==data.state.country_id){ // EDITED THIS LINE
                        $(this).attr("selected","selected");
                        modal.find('#select2-update_country-container').html(data.state.country.name);
                    }
                });
                updatecityState();
                modal.find('#update_state option').each(function(){
                    if($(this).val()==data.state.id){ // EDITED THIS LINE
                        $(this).attr("selected","selected");
                    }
                });
                modal.find('#city_id').val(data.id);
                modal.find('#update_city').val(data.name);
            });

            function updatecityState(){
                var country_id = $('#update_country').val();
                var states = [];
                var selected_country = countries.find(country => country.id == country_id);
                if(typeof(selected_country) != 'undefined'){
                    var states = selected_country.states;
                }
                var options = '<option value="" aria-disabled="true">Select Province *</option>';
                states.forEach(state => {
                    options += '<option value="'+state.id+'" >'+state.name+'</option>';
                });
                $('#update_state').empty().append(options);
            }
        });
    </script>
@endsection
