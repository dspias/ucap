@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __($page_title. ' | Details'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Select2 css -->
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" type="text/css">
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
    <b class="text-capitalize">{{ $data->name }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Centres') }}</li>
    <li class="breadcrumb-item">
        @if ($page == 'all')
            <a href="{{ route('superadmin.centre.index') }}">{{ __($page_title) }}</a>
        @elseif ($page == 'active')
            <a href="{{ route('superadmin.centre.index') }}">{{ __($page_title) }}</a>
        @else
            <a href="{{ route('superadmin.centre.index') }}">{{ __($page_title) }}</a>
        @endif
    </li>
    <li class="breadcrumb-item active">{{ __('Details') }}</li>
@endsection


@section('action')
    @php
        if ($page == 'all')
            $back = 'superadmin.centre.index';
        elseif ($page == 'active')
            $back = 'superadmin.centre.index';
        else
            $back = 'superadmin.centre.index';
    @endphp
    <a href="{{ route($back) }}" class="btn btn-custom">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
    <a href="{{ route('superadmin.centre.edit', [$data->id]) }}" class="btn btn-custom bg-ucap confirm" confirm="Are you sure want to Edit this Course?">
        <i class="ti-pencil mr-1"></i>
        {{ __('Edit') }}
    </a>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <div class="col-md-4">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="profilebox py-4 text-center">
                    @if(!is_null($url = has_media($data->centre, 'avatar', 'thumb')))
                        <img src="{{ show_image($url) }}" class="img-fluid mb-3 rounded-circle" width="150px" alt="profile">
                    @else
                        <img src="https://via.placeholder.com/500x500?text=No+Avatar+Found" class="img-fluid mb-3 rounded-circle" width="150px" alt="profile">
                    @endif
                    <div class="profilename">
                        <h4 class="text-ucap text-bold">{{ $data->name }}</h4>
                    </div>
                    <div class="button-list">
                        <a href="Tel: {{ optional($data->centre)->phone }}" class="btn btn-primary-rgba font-18"><i class="feather icon-phone"></i></a>
                        <a href="mailto:{{ $data->email }}" class="btn btn-info-rgba font-18"><i class="feather icon-mail"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-8">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-left">{{ __('Name') }}</th>
                                <td class="text-right">{{ $data->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Birthdate') }}</th>
                                <td class="text-right">{{ get_date(optional($data->centre)->dob, 'd M, Y') }} <sup class="text-ucap text-bold">{{ get_age(optional($data->centre)->dob).' Years' }}</sup></td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Gender') }}</th>
                                <td class="text-right">{{ optional($data->centre)->gender }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Email') }}</th>
                                <td class="text-right">{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Mobile No.') }}</th>
                                <td class="text-right">{{ optional($data->centre)->phone }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Native Language') }}</th>
                                <td class="text-right">{{ native_lang(optional($data->centre)->language) }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Country') }}</th>
                                <td class="text-right">{{ optional($data->centre)->country }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Province') }}</th>
                                <td class="text-right">{{ optional($data->centre)->state }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('City') }}</th>
                                <td class="text-right">{{ optional($data->centre)->city }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Address') }}</th>
                                <td class="text-right">{{ optional($data->centre)->address }}</td>
                            </tr>
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
@endsection
