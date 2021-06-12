@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Application | Details'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .card .card-body .card{
        border: 1px solid #f6f6f6;
    }
    .btn-round {
        width: 30px;
        height: 30px;
        padding: 0px 5px;
        font-size: 18px;
        border-radius: 50%;
    }
    .dropdown-menu.show{
        box-shadow: 0px 0px 15px -3px rgb(0 0 0 / 10%) !important;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-capitalize">{{ $application->aid }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Applications') }}</li>
    <li class="breadcrumb-item">
        @if ($page == 'all')
            <a href="{{ route('superadmin.application.index') }}">{{ __('All Applications') }}</a>
        @elseif ($page == 'processing')
            <a href="{{ route('superadmin.application.processing') }}">{{ __('Processing Applications') }}</a>
        @elseif ($page == 'approved')
            <a href="{{ route('superadmin.application.approved') }}">{{ __('Approved Applications') }}</a>
        @elseif ($page == 'pending')
            <a href="{{ route('superadmin.application.pending') }}">{{ __('Pending Applications') }}</a>
        @else
            <a href="{{ route('superadmin.application.rejected') }}">{{ __('Rejected Applications') }}</a>
        @endif
    </li>
    <li class="breadcrumb-item active">{{ __('Details') }}</li>
@endsection


@section('action')
    <a href="{{ url()->previous() }}" class="btn btn-custom m-r-10">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
    <a href="#" target="_blank" class="btn btn-custom text-bold float-right confirm" confirm="Are you sure want to Chat with the Applicant?">
        <i class="feather icon-message-circle"></i>
        {{ __('Live Chat') }}
    </a>
@endsection



@section('content')

<!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <h5 class="card-title text-bold float-left mb-0 m-b-0">{{ __('Application Details') }}</h5>
                </div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th class="text-center">{{ __('#') }}</th>
                                            <th class="text-center">{{ __('Program') }}</th>
                                            <th class="text-center">{{ __('University') }}</th>
                                            <th class="text-center">{{ __('Application Fee') }}</th>
                                            <th class="text-center">{{ __('Representative') }}</th>
                                            <th class="text-center">{{ __('Status') }}</th>
                                            <th class="text-center">{{ __('Action') }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $total = 0.00;
                                        @endphp
                                        @foreach ($application->programs as $sl => $data)
                                        @php
                                            $program = optional($data)->program;
                                            $university = optional($program->faculty)->university;
                                            $representatives = optional($university)->universityRepresentatives()->whereLanguage($application->native_lang)->get();
                                            $total += $data->original_fee;
                                        @endphp
                                        <tr>
                                            <td class="text-center">{{ $sl+1 }}</td>
                                            <td class="text-center">
                                                <a href="{{ route('guest.program.show', ['program_id' => decbin($program->id), 'program_title' => get_name($program->short_name)]) }}" target="_blank" class="text-bold text-ucap">{{ $program->name }}</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="{{ route('guest.university.show', ['id' => decbin(optional($university)->id), 'name' => get_name(optional($university)->name)]) }}" target="_blank" class="text-bold text-dark">{{ optional($university)->name }}</a>
                                            </td>
                                            <td class="text-center">{{ ucap_get('currency_sign') .$data->discount_fee }}</td>
                                            <td class="text-center">
                                                @if (!is_null($data->representative_id))
                                                    <a href="{{ route('superadmin.representative.show', ['id' => $data->representative_id, 'page' => 'all']) }}" target="_blank" class="text-bold text-ucap">{{ optional($data->representative)->name }}</a>
                                                @else
                                                    <a href="javascript:void(0);" data-toggle="modal" data-todo="{{ $representatives }}" data-appitem="{{ $data }}" data-target="#assignRepresentative"  class="btn btn-dark bg-ucap btn-sm text-bold" title="{{ __('Assign Representative & Accept Application') }}">
                                                        <i class="feather icon-plus"></i>
                                                        {{ 'Assign' }}
                                                    </a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                {!! application_status($data->status, $data->note) !!}
                                            </td>
                                            <td class="text-center">
                                                @if($data->status > -1)
                                                <div class="btn-group mr-2">
                                                    <div class="dropdown">
                                                        <button class="btn btn-round btn-outline-dark" type="button" id="btn_id_no_01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="feather icon-more-horizontal-"></i>
                                                        </button>
                                                        <div class="dropdown-menu" aria-labelledby="btn_id_no_01">
                                                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#assignRepresentative"  data-todo="{{ $representatives }}" data-appitem="{{ $data }}" >
                                                                @if(!is_null($data->representative_id))
                                                                <i class="fa fa-check text-success"></i> {{ __('Change Rep.') }}
                                                                @else
                                                                <i class="fa fa-check text-success"></i> {{ __('Accept') }}
                                                                @endif
                                                            </a>
                                                            <a class="dropdown-item" href="javascript:void(0);" data-toggle="modal" data-target="#rejectApplication">
                                                                <i class="fa fa-ban text-danger"></i> {{ __('Reject') }}
                                                            </a>
                                                        </div>
                                                        @include('superadmin.application.modals.representative')
                                                        @include('superadmin.application.modals.reject')
                                                    </div>
                                                </div>
                                                @else
                                                {{ __('No Action') }}
                                                @endif
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-6 offset-6">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="text-left text-ucap text-bold">{{ __('Total:') }}</th>
                                            <td class="text-right text-ucap text-bold">
                                                {{ ucap_get('currency_sign') . $total }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-left text-muted">{{ __('Discount:') }}</th>
                                            <td class="text-right text-muted">
                                                <i class="ti-minus font-12"></i>
                                                {{ ucap_get('currency_sign') . $application->discount }}
                                            </td>
                                        </tr>
                                        <tr>
                                            <th class="text-left text-muted">{{ __('Tax:') }}</th>
                                            <td class="text-right text-muted">
                                                <i class="ti-plus font-12"></i>
                                                {{ ucap_get('currency_sign') . $application->tax }}
                                            </td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr class="bg-ucap text-white text-bold">
                                            <th class="text-left text-white text-bold">{{ __('Sub Total:') }}</th>
                                            <td class="text-right text-white text-bold">
                                                {{ ucap_get('currency_sign') . $application->amount }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $('#assignRepresentative').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('todo');
                var appItem = button.data('appitem');

                var modal = $(this);
                let options = '<option value="" aria-disabled="true">Select Representative</option>';
                data.forEach(rep => {
                    var selected = (appItem.representative_id == rep.user_id) ? 'selected':'';
                    options += '<option value="'+rep.user_id+'" '+selected+'>'+rep.first_name+' '+rep.last_name+'</option>';
                });
                $('#assignRepresentativeOption').empty().append(options);
                $('#appitem').val(appItem.id);
            });
    </script>
@endsection
