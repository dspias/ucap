@extends('layouts.representative.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Applications'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- DataTables css -->
    <link href="{{ asset('assets/plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css" />
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
    <b class="text-uppercase">{{ __('New Assigned') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Applications') }}</li>
    <li class="breadcrumb-item active">{{ __('New Assigned') }}</li>
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
                    <h5 class="card-title float-left">{{ __('New Assigned') }}</h5>
                    <a href="#" class="btn btn-outline-dark btn-sm float-right">{{ __('Add New') }}</a>
                </div> --}}
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="applicationTable" class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>{{ __('#') }}</th>
                                    <th>{{ __('ID') }}</th>
                                    <th>{{ __('Program') }}</th>
                                    <th>{{ __('Native Language') }}</th>
                                    <th>{{ __('Level') }}</th>
                                    <th>{{ __('Student Name') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($applications as $sl => $data)
                                <tr data-href="{{ route('representative.application.show', ['page' => 'assigned', 'app_id' => decbin($data->id)]) }}">
                                    <td>{{ $sl+1 }}</td>
                                    <td>{{ optional($data->application)->aid }}</td>
                                    <td>{{ optional($data->program)->name }}</td>
                                    <td>
                                        <span class="text-bold"  id="show_native" onmouseover="setLanguage(this, '{{ optional($data->application)->native_lang }}')">
                                            {{ __('native language') }}
                                        </span>
                                        <div style="display: none;" id="native_language" >
                                            @include('representative.application.apart.languages')
                                        </div>
                                    </td>
                                    <td>{{ ucfirst(optional($data->program)->level) }}</td>
                                    <td>{{ optional(optional($data->application)->student)->name }}</td>
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        /*
        ---------------------------------------
            : Custom - Table Datatable js :
        ---------------------------------------
        */
        "use strict";
        $(document).ready(function() {
            /* -- Table - Datatable -- */
            $('#applicationTable').DataTable({
                responsive: true
            });
        });



        function setLanguage(that, selected){
            var lang = null;
            var options = $('#native_language').find('option').each(function(){
                if($(this).val()==selected){ // EDITED THIS LINE
                        lang = $(this).html();
                    }
            });
            $(that).html(lang);
        }
    </script>
@endsection
