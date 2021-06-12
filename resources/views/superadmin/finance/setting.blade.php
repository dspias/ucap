@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Settings'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
        .total-commission{
            padding: 50px;
            font-size: 4rem;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Settings') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Finance') }}</li>
    <li class="breadcrumb-item active">{{ __('Settings') }}</li>
@endsection


{{-- @section('action')
    <a class="btn btn-custom bg-ucap" href="{{ route('superadmin.finance.all') }}">
        <i class="feather icon-info mr-1"></i>
        {{ __('See All Payments') }}
    </a>
@endsection --}}



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-lg-4">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-3 text-muted">{{ __('UCAP Commission') }}</h3>
                        <h1 class="mb-0 text-ucap text-bold">{{ $commission['ucap'] }}%</h1>
                    </div>
                    <a class="align-self-center mr-3 action-icon badge badge-secondary-inverse bg-ucap" href="#updateUcapCommission" data-toggle="modal" title="{{ __('Update UCAP Commission') }}">
                        <i class="ti-pencil-alt"></i>
                    </a>
                </div>

                @include('superadmin.finance.modals.ucap')
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-3 text-muted">{{ __('University Commission') }}</h3>
                        <h1 class="mb-0 text-ucap text-bold">{{ $commission['university'] }}%</h1>
                    </div>
                    <a class="align-self-center mr-3 action-icon badge badge-secondary-inverse bg-ucap" href="#updateUniversityCommission" data-toggle="modal" title="{{ __('Update University Commission') }}">
                        <i class="ti-pencil-alt"></i>
                    </a>
                </div>

                @include('superadmin.finance.modals.university')
            </div>
        </div>
    </div>

    <div class="col-lg-4">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="media">
                    <div class="media-body">
                        <h3 class="mb-3 text-muted">{{ __('Representative Commission') }}</h3>
                        <h1 class="mb-0 text-ucap text-bold">{{ $commission['representative'] }}%</h1>
                    </div>
                    <a class="align-self-center mr-3 action-icon badge badge-secondary-inverse bg-ucap" href="#updateRepresentativeCommission" data-toggle="modal" title="{{ __('Update Representative Commission') }}">
                        <i class="ti-pencil-alt"></i>
                    </a>
                </div>

                @include('superadmin.finance.modals.representative')
            </div>
        </div>
    </div>
    <!-- End col -->
</div>

<div class="row">
    <!-- Start col -->
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 class="card-title float-left">{{ __('Payment Terms & Conditions') }}</h4>
                <a href="javascript:void(0);" data-toggle="modal" data-target="#addNewTermsAndCondition" class="btn btn-custom btn-sm bg-ucap float-right" title="{{ __('Add New Terms & Condition') }}">{{ __('Add New') }}</a>

                @include('superadmin.finance.modals.terms')
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 10%;">{{ __('#') }}</th>
                                <th class="text-left" style="width: 60%;">{{ __('Terms & Conditions') }}</th>
                                <th  class="text-left" style="width: 15%;">{{ __('Updated Date') }}</th>
                                <th class="text-center" style="width: 15%;">{{ __('Action') }}</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ((array)$termcondition as $sl => $data)
                            <tr>
                                <td class="text-center" style="width: 10%;">{{ serial($sl) }}</td>
                                <td class="text-left" style="width: 60%;">{{ $data['termcondition'] }}</td>
                                <td class="text-left" style="width: 15%;">{{ get_date($data['updated_at'], 'd M, Y') }}</td>
                                <td class="text-center" style="width: 15%;">
                                    @php
                                        $en_data = json_encode($data);
                                    @endphp
                                    <a class="btn btn-custom btn-sm"  href="javascript:void(0);" data-keyboard="false" data-toggle="modal" data-target="#editTermsAndCondition" data-key="{{ $sl }}" data-todo="{{ $en_data }}"><i class="ti-pencil"></i></a>
                                    <a class="btn btn-custom bg-ucap btn-sm confirm" confirm="Are You sure want to delete this term and condition?" href="{{ route('superadmin.finance.termcondition.delete', ['key' => $sl]) }}"><i class="ti-trash"></i></a>
                                </td>
                                @include('superadmin.finance.modals.edit_terms')
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        $('#editTermsAndCondition').on('show.bs.modal', function (e) {
            // do something...
            var button = $(e.relatedTarget); // Button that triggered the modal
            var data = button.data('todo');
            var key = button.data('key');
            var modal = $(this);
            modal.find('#update_termcondition').val(data.termcondition);
            modal.find('#update_key').val(key);
        });
    </script>
@endsection
