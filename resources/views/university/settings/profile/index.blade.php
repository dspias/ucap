@extends('layouts.university.app')

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
        .card.university-card .card-header .profilebox img {
            /* position: absolute; */
            top: 80px;
            /* left: 27%; */
            position: absolute;
            margin-left: auto;
            margin-right: auto;
            left: 0;
            right: 0;
            text-align: center;
        }
        .card.university-card .button-list .btn {
            margin-right: 0px;
            margin-bottom: 5px;
        }

        .cover-photo {
            height: 106px;
            background-size: cover;
            background-position: center;
        }
        .university-logo{
            height: 100px;
            width: 100px;
        }
        .university-admin-avatar{
            height: 150px;
            width: 150px;
        }
    </style>
@endsection


@section('page_name')
    <b class="text-capitalize">{{ $university->name }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item active">{{ __('Profile') }}</li>
@endsection


@section('action')
    <a href="{{ url()->previous() }}" class="btn btn-custom">
        <i class="feather icon-arrow-left mr-1"></i>
        {{ __('Back') }}
    </a>
    <a href="{{ route('university.settings.university.index') }}" class="btn btn-custom bg-ucap confirm" confirm="Are you sure want to Edit this University?">
        <i class="ti-pencil mr-1"></i>
        {{ __('Edit') }}
    </a>
    <a href="{{ route('guest.university.show', ['id' => decbin($university->id), 'name' => get_name($university->name)]) }}" target="_blank" class="btn btn-custom-outline" data-toggle="tooltip" data-title="{{ __('See preview in live website') }}">
        <i class="ti-eye mr-1"></i>
        {{ __('Live') }}
    </a>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <div class="col-md-4">
        <div class="card university-card m-b-30">
            <div class="card-header p-0">
                @if(!is_null($url = has_media($university->university, 'cover')))
                    <div class="cover-photo" style="background-image: url({{ show_image($url) }});"></div>
                @else
                    <div class="cover-photo" style="background-image: url(https://via.placeholder.com/1280x500?text=No+Cover+Found);"></div>
                @endif

                <div class="profilebox text-center">
                    @if(!is_null($url = has_media($university->university, 'logo')))
                    <img src="{{ show_image($url) }}" class="img-fluid img-thumbnail mb-3 rounded-circle university-logo" width="100px" alt="profile">
                    @else
                    <img src="https://via.placeholder.com/500x500?text=No+Avatar+Found" class="img-fluid img-thumbnail mb-3 rounded-circle university-logo" width="100px" alt="profile">
                    @endif
                </div>
            </div>
            <div class="card-body">
                <div class="profilebox p-t-50 text-center">
                    <div class="profilename">
                        <h4 class="text-ucap text-bold">{{ $university->name }}</h4>
                        <h6 class="text-dark">{{ optional($university->university)->address }}</h6>
                    </div>
                    <div class="button-list">
                        <a href="{{ optional($university->university)->website }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Website') }}" class="btn btn-custom font-10">
                            <i class="fa fa-feed"></i>
                        </a>
                        <a href="Tel:{{ optional($university->university)->phone }}" data-toggle="tooltip" data-title="{{ __('Mobile') }}" class="btn btn-custom font-10">
                            <i class="fa fa-phone"></i>
                        </a>
                        <a href="mailto:{{ optional($university->university)->email }}" data-toggle="tooltip" data-title="{{ __('Email') }}" class="btn btn-custom font-10">
                            <i class="fa fa-envelope"></i>
                        </a>
                        <a href="{{ optional($university->university)->facebook }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Facebook') }}" class="btn btn-custom font-10">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="{{ optional($university->university)->twitter }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Twitter') }}" class="btn btn-custom font-10">
                            <i class="fa fa-twitter"></i>
                        </a>
                        <a href="{{ optional($university->university)->linkedin }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Linkedin') }}" class="btn btn-custom font-10">
                            <i class="fa fa-linkedin"></i>
                        </a>
                        <a href="{{ optional($university->university)->instagram }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Instagram') }}" class="btn btn-custom font-10">
                            <i class="fa fa-instagram"></i>
                        </a>
                        <a href="https://wa.me/{{ optional($university->university)->whatsapp }}" target="_blank" data-toggle="tooltip" data-title="{{ __('Whatsapp') }}" class="btn btn-custom font-10">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                        {{-- <a href="https://telegram.me/{{ optional($university->university)->telegram }}" data-toggle="tooltip" data-title="{{ __('Telegram') }}" class="btn btn-custom font-10">
                            <i class="fa fa-telegram"></i>
                        </a> --}}
                    </div>
                </div>
            </div>
        </div>


        <div class="card m-b-30">
            <div class="card-body">
                <div class="profilebox text-center">
                    @if(!is_null($url = has_media($university->university, 'admin')))
                        <img src="{{ show_image($url) }}" class="img-fluid mb-3 rounded-circle university-admin-avatar" height="150px" width="150px" alt="profile">
                    @else
                        <img src="https://via.placeholder.com/500x500?text=No+Avatar+Found" class="img-fluid mb-3 rounded-circle university-admin-avatar" height="150px" width="150px" alt="profile">
                    @endif

                    <div class="profilename">
                        <h4 class="text-ucap text-bold">{{ 'Admin Name' }}</h4>
                        <h6 class="text-dark">{{ optional($university->university)->admin_name }}</h6>
                    </div>
                    <div class="button-list">
                        <a href="Tel:{{ optional($university->university)->admin_mobile }}" data-toggle="tooltip" data-title="{{ __('Mobile') }}" class="btn btn-custom font-14">
                            <i class="fa fa-phone"></i>
                        </a>
                        <a href="mailto:{{ optional($university->university)->admin_email }}" data-toggle="tooltip" data-title="{{ __('Email') }}" class="btn btn-custom font-14">
                            <i class="fa fa-envelope"></i>
                        </a>
                        <a href="{{ optional($university->university)->admin_facebook }}" data-toggle="tooltip" data-title="{{ __('Facebook') }}" class="btn btn-custom font-14">
                            <i class="fa fa-facebook"></i>
                        </a>
                        <a href="https://wa.me/{{ optional($university->university)->admin_whatsapp }}" data-toggle="tooltip" data-title="{{ __('Whatsapp') }}" class="btn btn-custom font-14">
                            <i class="fa fa-whatsapp"></i>
                        </a>
                        <a href="https://telegram.me/{{ optional($university->university)->admin_telegram }}" data-toggle="tooltip" data-title="{{ __('Telegram') }}" class="btn btn-custom font-14">
                            <i class="fa fa-telegram"></i>
                        </a>
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
                                <th class="text-left text-bold">{{ __('University Name') }}</th>
                                <td class="text-right text-ucap text-bold">{{ $university->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('University Email') }}</th>
                                <td class="text-right">{{ optional($university->university)->email }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('University Phone') }}</th>
                                <td class="text-right">{{ optional($university->university)->phone }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Country') }}</th>
                                <td class="text-right">{{ optional(optional(optional(optional($university->university)->city)->state)->country)->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Province') }}</th>
                                <td class="text-right">{{  optional(optional(optional($university->university)->city)->state)->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('City') }}</th>
                                <td class="text-right">{{ optional(optional($university->university)->city)->name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Postal  Code') }}</th>
                                <td class="text-right">{{ optional($university->university)->post_code }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Address') }}</th>
                                <td class="text-right">{{ optional($university->university)->address }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Assigned At') }}</th>
                                <td class="text-right">{{ get_date($university->created_at, 'd M, Y') }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <tbody>
                            <tr>
                                <th class="text-left text-bold">{{ __('Admin Name') }}</th>
                                <td class="text-right text-ucap text-bold">{{ optional($university->university)->admin_name }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Admin Gender') }}</th>
                                <td class="text-right">{{ optional($university->university)->gender }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Admin Email') }}</th>
                                <td class="text-right">{{ optional($university->university)->admin_email }}</td>
                            </tr>
                            <tr>
                                <th class="text-left">{{ __('Admin Phone') }}</th>
                                <td class="text-right">{{ optional($university->university)->admin_mobile }}</td>
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
