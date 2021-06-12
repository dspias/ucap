@extends('layouts.representative.app')

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
    </style>
@endsection


@section('page_name')
    <b class="text-capitalize">{{ __('application_id_here') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Applications') }}</li>
    <li class="breadcrumb-item">
        @if ($page == 'assigned')
            <a href="{{ route('representative.application.assigned') }}">{{ __('Assigned Applications') }}</a>
        @elseif ($page == 'completed')
            <a href="{{ route('representative.application.completed') }}">{{ __('Completed Applications') }}</a>
        @else
            <a href="{{ route('representative.application.rejected') }}">{{ __('Rejected Applications') }}</a>
        @endif
    </li>
    <li class="breadcrumb-item active">{{ __('Details') }}</li>
@endsection


@section('action')
    <a href="{{ url()->previous() }}" class="btn btn-custom">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
@endsection



@section('content')

<!-- Start row -->
    <div class="row">
        <!-- Start col -->
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-header">
                    <a href="{{ route('representative.live_chat.index') }}" class="btn btn-custom bg-ucap btn-sm text-bold float-right m-r-10 confirm" confirm="Are you sure want to Chat with the Applicant?">
                        <i class="feather icon-message-circle"></i>
                        {{ __('Live Chat') }}
                    </a>
                </div>

                <div class="card-body">
                    <div class="card m-b-20">
                        <div class="card-header">
                            <h5 class="card-title float-left">{{ __('Profile Details') }}</h5>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="text-center" style="width: 30%;">
                                                {{ __('Full Name') }}
                                            </th>
                                            <td class="text-center" style="width: 60%;">
                                                {{ 'file_here' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">
                                                {{ __('Gender') }}
                                            </th>
                                            <td class="text-center" style="width: 60%;">
                                                {{ 'student_gender_here' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">
                                                {{ __('Birthdate') }}
                                            </th>
                                            <td class="text-center" style="width: 60%;">
                                                {{ 'student_Birthdate_here' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">
                                                {{ __('Native Language') }}
                                            </th>
                                            <td class="text-center" style="width: 60%;">
                                                {{ 'student_Native_Language_here' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">
                                                {{ __('Email ID') }}
                                            </th>
                                            <td class="text-center" style="width: 60%;">
                                                {{ 'student_Email_ID_here' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">
                                                {{ __('Mobile Number') }}
                                            </th>
                                            <td class="text-center" style="width: 60%;">
                                                {{ 'student_Mobile_Number_here' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">
                                                {{ __('Country') }}
                                            </th>
                                            <td class="text-center" style="width: 60%;">
                                                {{ 'student_Country_here' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">
                                                {{ __('Province') }}
                                            </th>
                                            <td class="text-center" style="width: 60%;">
                                                {{ 'student_State_here' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">
                                                {{ __('City') }}
                                            </th>
                                            <td class="text-center" style="width: 60%;">
                                                {{ 'student_City_here' }}
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">
                                                {{ __('Address') }}
                                            </th>
                                            <td class="text-center" style="width: 60%;">
                                                {{ 'student_Address_here' }}
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


                    <div class="card">
                        <div class="card-header">
                            <h5 class="card-title float-left">{{ __('All Documents') }}</h5>
                            <a href="#" class="btn btn-custom btn-sm float-right confirm" confirm="{{ __('Are you sure want to Download All Documents?') }}">
                                <i class="ti-download"></i>
                                {{ __('Download All') }}
                            </a>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th class="text-center" style="width: 30%;">{{ __('Passport Size Photo') }}</th>
                                            <td class="text-center" style="width: 60%;">
                                                <a href="#" class="text-ucap text-bold">{{ 'file_here' }}</a>
                                            </td>
                                            <td class="text-center" style="width: 10%;">
                                                <a href="#" class="btn btn-custom btn-sm text-bold">
                                                    <i class="ti-download"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">{{ __('NID / Birth Certificate') }}</th>
                                            <td class="text-center" style="width: 60%;">
                                                <a href="#" class="text-ucap text-bold">{{ 'file_here' }}</a>
                                            </td>
                                            <td class="text-center" style="width: 10%;">
                                                <a href="#" class="btn btn-custom btn-sm text-bold">
                                                    <i class="ti-download"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">{{ __('Passport') }}</th>
                                            <td class="text-center" style="width: 60%;">
                                                <a href="#" class="text-ucap text-bold">{{ 'file_here' }}</a>
                                            </td>
                                            <td class="text-center" style="width: 10%;">
                                                <a href="#" class="btn btn-custom btn-sm text-bold">
                                                    <i class="ti-download"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">{{ __('Language Test') }}</th>
                                            <td class="text-center" style="width: 60%;">
                                                <a href="#" class="text-ucap text-bold">{{ 'file_here' }}</a>
                                            </td>
                                            <td class="text-center" style="width: 10%;">
                                                <a href="#" class="btn btn-custom btn-sm text-bold">
                                                    <i class="ti-download"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">{{ __('Educational Docs') }}</th>
                                            <td class="text-center" style="width: 60%;">
                                                <a href="#" class="text-ucap text-bold">{{ 'file_here' }}</a>
                                            </td>
                                            <td class="text-center" style="width: 10%;">
                                                <a href="#" class="btn btn-custom btn-sm text-bold">
                                                    <i class="ti-download"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">{{ __('Declaration/Signature') }}</th>
                                            <td class="text-center" style="width: 60%;">
                                                <a href="#" class="text-ucap text-bold">{{ 'file_here' }}</a>
                                            </td>
                                            <td class="text-center" style="width: 10%;">
                                                <a href="#" class="btn btn-custom btn-sm text-bold">
                                                    <i class="ti-download"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <th class="text-center" style="width: 30%;">{{ __('Additional Docs') }}</th>
                                            <td class="text-center" style="width: 60%;">
                                                <a href="#" class="text-ucap text-bold">{{ 'file_here' }}</a>
                                            </td>
                                            <td class="text-center" style="width: 10%;">
                                                <a href="#" class="btn btn-custom btn-sm text-bold">
                                                    <i class="ti-download"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card-footer">
                    <a href="#" class="btn btn-custom btn-sm float-right confirm" confirm="{{ __('Are you sure want to Approve the Application?') }}">
                        <i class="ti-check"></i>
                        {{ __('Approve') }}
                    </a>
                    <a href="javascript:void(0);" data-toggle="modal" data-target="#rejectApplication" class="btn btn-danger btn-sm float-right m-r-10 ">
                        <i class="ti-close"></i>
                        {{ __('Reject') }}
                    </a>
                    {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#createNewCity" class="btn btn-outline-dark btn-sm float-right">{{ __('Add New') }}</a> --}}

                    @include('university.application.modals.reject')
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
    </script>
@endsection
