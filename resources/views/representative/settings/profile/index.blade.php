@extends('layouts.representative.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Profile'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-capitalize">{{ $data->name }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Settings') }}</li>
    <li class="breadcrumb-item active">{{ __('Profile') }}</li>
@endsection


@section('action')
    <a href="{{ url()->previous() }}" class="btn btn-custom">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
    <a href="{{ route('representative.settings.profile.edit', ['user_id' => decbin($data->id)]) }}" class="btn btn-custom bg-ucap confirm" confirm="Are you sure want to edit profile?">
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
                    @if(!is_null($url = has_media($data->representative, 'avatar', 'thumb')))
                        <img src="{{ show_image($url) }}" class="img-fluid mb-3 rounded-circle" width="150px" alt="profile">
                    @else
                        <img src="https://via.placeholder.com/500x500?text=No+Avatar+Found" class="img-fluid mb-3 rounded-circle" width="150px" alt="profile">
                    @endif
                    <div class="profilename">
                        <h4 class="text-ucap text-bold">{{ $data->name }}</h4>
                        <h6 class="text-info">{{ optional(optional($data->representative)->university)->name }}</h6>
                    </div>
                    <div class="button-list">
                        <a href="Tel: {{ optional($data->representative)->phone }}" class="btn btn-primary-rgba font-18"><i class="feather icon-phone"></i></a>
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
                                <td class="text-right">{{ get_date(optional($data->representative)->dob, 'd M, Y') }} <sup class="text-ucap text-bold">{{ get_age(optional($data->representative)->dob).' Years' }}</sup></td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Gender') }}</th>
                                <td class="text-right">{{ optional($data->representative)->gender }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Email') }}</th>
                                <td class="text-right">{{ $data->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Mobile No.') }}</th>
                                <td class="text-right">{{ optional($data->representative)->phone }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Native Language') }}</th>
                                <td class="text-right">{{ native_lang(optional($data->representative)->language) }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Country') }}</th>
                                <td class="text-right">{{ optional($data->representative)->country }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Province') }}</th>
                                <td class="text-right">{{ optional($data->representative)->state }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('City') }}</th>
                                <td class="text-right">{{ optional($data->representative)->city }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Address') }}</th>
                                <td class="text-right">{{ optional($data->representative)->address }}</td>
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
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
