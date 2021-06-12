@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Language Tests'))

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
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Language Tests') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Settings') }}</li>
    <li class="breadcrumb-item">{{ __('Language Test') }}</li>
    {{-- <li class="breadcrumb-item active">{{ __('Cities') }}</li> --}}
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
                    <h5 class="card-title float-left">{{ __('All Available Language Tests') }}</h5>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#createNewExam" class="btn btn-outline-dark btn-sm float-right">{{ __('Add New') }}</a>

                    @include('superadmin.settings.languageexam.modals.create_lang_exam')
                    @include('superadmin.settings.languageexam.modals.update_lang_exam')
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatable-buttons" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('Name') }}</th>
                                    <th>{{ __('Score') }}</th>
                                    <th>{{ __('Registerd At') }}</th>
                                    <th>{{ __('Status') }}</th>
                                    <th class="text-center">{{ __('Action') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($exams as $sl => $exam)
                                <tr>
                                    <td>{{ __($sl+1) }}</td>
                                    <td class="text-bold">{{ $exam->name }}</td>
                                    <td class="text-bold">{{ $exam->score }}</td>
                                    <td>{{ get_date($exam->created_at, 'd M, Y') }}</td>
                                    <td>{!! get_status($exam->status) !!}</td>
                                    <td class="text-center">
                                        <div class="btn-group mr-2">
                                            <div class="dropdown">
                                                <button class="btn btn-round btn-outline-dark" type="button" id="btn_id_no_01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="feather icon-more-horizontal-"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="btn_id_no_01">
                                                    @if($exam->status == 1)
                                                    <a class="dropdown-item text-danger" confirm="Are You sure to inactive this exam?" href="{{ route('superadmin.settings.languageexam.change_status', [$exam->id]) }}">
                                                        <i class="feather icon-x text-danger"></i> {{ __('Inactive') }}
                                                    </a>
                                                    @else
                                                    <a class="dropdown-item text-success" confirm="Are You sure to active this exam?" href="{{ route('superadmin.settings.languageexam.change_status', [$exam->id]) }}">
                                                        <i class="feather icon-check text-success"></i> {{ __('Active') }}
                                                    </a>
                                                    @endif
                                                    <a href="javascript:void(0);" data-toggle="modal" data-todo="{{ $exam }}" data-target="#updateExam" class="dropdown-item">
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $(document).ready(function(){

            $('#updateExam').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('todo');

                var modal = $(this);

                modal.find('#exam_id').val(data.id);
                modal.find('#name').val(data.name);
                modal.find('#score').val(data.score);
                modal.find('#desrciption').val(data.desrciption);
            });
        });
    </script>
@endsection
