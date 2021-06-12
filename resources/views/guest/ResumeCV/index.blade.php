<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        {{-- Meta Starts --}}
        {{-- CSRF Token--}}
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="description" content="UCAP" />
        <meta name="keywords" content="UCAP" />
        <meta name="author" content="UCAP" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
        {{-- Meta Ends --}}

        {{--  Page Title  --}}
        <title> {{ __('UCAP') }} | {{ __('CV / Resume') }}</title>
        <!-- Fevicon -->
        <link rel="shortcut icon" href="{{ show_logo('small_logo') }}" />

        <!-- Start css -->
        <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/flag-icon.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css" />
        {{-- Custom Main CSS --}}
        <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" type="text/css" />


        <style>
            .student-cv-resume{
                padding: 30px 40px;
            }
            th.th, td.td{
                padding: 4px;
            }
        </style>
        <!-- End css -->
    </head>


    <body class="vertical-layout">
        <!-- Start Containerbar -->
        <div id="containerbar">
            <!-- Start Rightbar -->
            <div class="rightbar m-l-0 ml-0">
                <!-- Start Contentbar -->
                <div class="contentbar">
                    <!-- Start row -->
                    <div class="row justify-content-center">
                        <!-- Start col -->
                        <div class="col-md-12 col-lg-10 col-xl-10">
                            <div class="card m-b-30 student-cv-resume">
                                <div class="card-body">
                                    <div class="invoice">
                                        <div class="invoice-head">
                                            <div class="row">
                                                <div class="col-12 col-md-7 col-lg-7">
                                                    <h1 class="text-bold text-dark text-capitalize">{{ $student->name }}</h1>
                                                </div>
                                                <div class="col-12 col-md-5 col-lg-5">
                                                    <div class="invoice-name">
                                                        <address class="address-details">
                                                            <h6 class="text-dark">{{ __('Address:') }} <span class="text-muted">{{ optional($student->student)->city .', '. optional($student->student)->state .', '. optional($student->student)->country }}</span></h6>
                                                            <h6 class="text-dark">{{ __('Email:') }} <span class="text-muted"><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></span></h6>
                                                            <h6 class="text-dark">{{ __('Mobile:') }} <span class="text-muted"><a href="tel:{{ optional($student->student)->phone }}">{{ optional($student->student)->phone }}</a></span></h6>
                                                        </address>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="invoice-billing">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="basic-information m-b-20">
                                                        <h3 class="text-bold mb-3">{{ __('Basic Information\'s') }}</h3>
                                                        <table class="table table-borderless m-l-20">
                                                            <tbody class="tbody">
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ __('Full Name:') }}</th>
                                                                    <td class="td" style="width: 70%;">{{ $student->name }}</td>
                                                                </tr>
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ __('Gender:') }}</th>
                                                                    <td class="td" style="width: 70%;">{{ optional($student->student)->gender }}</td>
                                                                </tr>
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ __('Birthdate:') }}</th>
                                                                    <td class="td" style="width: 70%;">{{ get_date(optional($student->student)->dob) }}</td>
                                                                </tr>
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ __('Native Language:') }}</th>
                                                                    <td class="td" style="width: 70%;">
                                                                        <span class="text-bold"  id="show_native">
                                                                            {{ __('native language') }}
                                                                        </span>
                                                                        <div style="display: none;" id="native_language">
                                                                            @include('student.settings.apart.languages')
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ __('Country:') }}</th>
                                                                    <td class="td" style="width: 70%;">{{ optional($student->student)->country }}</td>
                                                                </tr>
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ __('State/Province:') }}</th>
                                                                    <td class="td" style="width: 70%;">{{ optional($student->student)->state }}</td>
                                                                </tr>
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ __('City:') }}</th>
                                                                    <td class="td" style="width: 70%;">{{ optional($student->student)->city }}</td>
                                                                </tr>
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ __('Address:') }}</th>
                                                                    <td class="td" style="width: 70%;">{{ optional($student->student)->address }}</td>
                                                                </tr>
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ __('Email:') }}</th>
                                                                    <td class="td" style="width: 70%;">{{ $student->email }}</td>
                                                                </tr>
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ __('Contact Number:') }}</th>
                                                                    <td class="td" style="width: 70%;">{{ optional($student->student)->phone }}</td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="invoice-billing">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="educational-information m-b-20">
                                                        <h3 class="text-bold mb-3">{{ __('Educational Information\'s') }}</h3>
                                                        <table class="table table-borderless m-l-20">
                                                            <tbody class="tbody">
                                                                @foreach($student->educations as $data)
                                                                <tr class="tr">
                                                                    <th class="th text-bold" style="width: 20%;">{{ $data->level }}</th>
                                                                    <td class="td" style="width: 40%;">
                                                                        <ul class="list-unstyled">
                                                                            <li>
                                                                                <span class="text-bold">{{ __('Education Field:') }}</span>
                                                                                <span class="text-muted p-l-30">{{ $data->field }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="text-bold">{{ __('Major Subject:') }}</span>
                                                                                <span class="text-muted p-l-30">{{ $data->major }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="text-bold">{{ __('Institute Address:') }}</span>
                                                                                <span class="text-muted p-l-30">{{ $data->address }}</span>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                    <td class="td" style="width: 40%;">
                                                                        <ul class="list-unstyled">
                                                                            <li>
                                                                                <span class="text-bold">{{ __('Score:') }}</span>
                                                                                <span class="text-muted p-l-30">{{ $data->score }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="text-bold">{{ __('Starting Year:') }}</span>
                                                                                <span class="text-muted p-l-30">{{ get_date($data->start_year, 'd M, Y') }}</span>
                                                                            </li>
                                                                            <li>
                                                                                @php
                                                                                    $endyear = 'Running';
                                                                                    $score = 'Running';
                                                                                    if($data->running == null){
                                                                                        $endyear = $data->end_year;
                                                                                        $score = $data->score;
                                                                                    }
                                                                                @endphp
                                                                                <span class="text-bold">{{ __('Ending Year:') }}</span>
                                                                                <span class="text-muted p-l-30">{{ $endyear }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="text-bold">{{ __('Documents: ') }}</span>
                                                                                <span class="text-muted p-l-30">
                                                                                    <a href="{{ route('guest.student.cv.downoad_education', ['model_id'=> decbin($data->id)]) }}" class="text-ucap text-bold">{{ 'Download' }}</a>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="invoice-billing">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="basic-information m-b-20">
                                                        <h3 class="text-bold mb-3">{{ __('Language Certification\'s') }}</h3>
                                                        <table class="table table-borderless m-l-20">
                                                            <tbody class="tbody">
                                                                @foreach($student->languageTests as $data)
                                                                <tr class="tr">
                                                                    <th class="th" style="width: 30%;">{{ optional($data->language)->name.':'}}</th>
                                                                    <td class="td" style="width: 40%;">
                                                                        <ul class="list-unstyled">
                                                                            <li>
                                                                                <span class="text-bold">{{ __('Score:') }}</span>
                                                                                <span class="text-muted p-l-30">{{ $data->band }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="text-bold">{{ __('Details:') }}</span>
                                                                                <span class="text-muted p-l-30">{{ $data->details }}</span>
                                                                            </li>
                                                                            <li>
                                                                                <span class="text-bold">{{ __('Documents: ') }}</span>
                                                                                <span class="text-muted p-l-30">
                                                                                    <a href="{{ route('guest.student.cv.downoad_language', ['model_id' => decbin($data->id)]) }}" class="text-ucap text-bold">{{ 'Download' }}</a>
                                                                                </span>
                                                                            </li>
                                                                        </ul>
                                                                    </td>
                                                                </tr>
                                                                @endforeach
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="invoice-billing">
                                            <div class="row">
                                                <div class="col-sm-12 col-md-12 col-lg-12">
                                                    <div class="basic-information m-b-20">
                                                        <h3 class="text-bold mb-3">{{ __('Reference\'s') }}</h3>
                                                        <div class="row">
                                                            @foreach($student->references as $data)
                                                            <div class="col-md-6">
                                                                <table class="table table-borderless m-l-20">
                                                                    <tbody class="tbody">
                                                                        <tr class="tr">
                                                                            <th class="th" style="width: 30%;">{{ __('Full Name:') }}</th>
                                                                            <td class="td" style="width: 70%;">{{ $data->first_name." ".$data->last_name }}</td>
                                                                        </tr>
                                                                        <tr class="tr">
                                                                            <th class="th" style="width: 30%;">{{ __('Professional Designation:') }}</th>
                                                                            <td class="td" style="width: 70%;">{{ $data->professional_designation }}</td>
                                                                        </tr>
                                                                        <tr class="tr">
                                                                            <th class="th" style="width: 30%;">{{ __('Company/Institution:') }}</th>
                                                                            <td class="td" style="width: 70%;">{{ $data->company_institution }}</td>
                                                                        </tr>
                                                                        <tr class="tr">
                                                                            <th class="th" style="width: 30%;">{{ __('Email:') }}</th>
                                                                            <td class="td" style="width: 70%;">{{ $data->email }}</td>
                                                                        </tr>
                                                                        <tr class="tr">
                                                                            <th class="th" style="width: 30%;">{{ __('Contact:') }}</th>
                                                                            <td class="td" style="width: 70%;">{{ $data->phone }}</td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            @endforeach
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        {{-- <div class="invoice-footer">
                                            <div class="row align-items-center">
                                                <div class="col-md-6">
                                                    <p class="mb-0">{{ __('Thank you for being with UCAP') }}</p>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="invoice-footer-btn">
                                                        <a href="javascript:window.print()" class="btn btn-dark py-1 font-16"><i class="feather icon-printer mr-2"></i>{{ __('Print') }}</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- End col -->
                    </div>
                    <!-- End row -->
                </div>
                <!-- End Contentbar -->
            </div>
            <!-- End Rightbar -->
        </div>
        <!-- End Containerbar -->



        <!-- Start js -->
        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
        <script src="{{ asset('assets/js/vertical-menu.js') }}"></script>
        {{-- Sweet Alert 2 --}}
        <script src="{{ asset('assets/js/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/sweetalert.custom.js') }}"></script>
        <!-- Core js -->
        <script src="{{ asset('assets/js/core.js') }}"></script>
        {{-- Custom Main JS --}}
        <script src="{{ asset('assets/js/main.js') }}"></script>

        <script>
            var selected = '{{ optional($student->student)->language }}';
            var lang = null;
            var options = $('#native_language').find('option').each(function(){
                if($(this).val()==selected){ // EDITED THIS LINE
                        lang = $(this).html();
                    }
            });
            $('#show_native').html(lang);
        </script>
        <!-- End js -->
    </body>
</html>
