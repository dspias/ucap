@extends('student.layouts.student')

@section('page_title', __('PROFILE'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .dashboard_container.no-shadow{
        border: 1px solid #f7f7f7;
        border-radius: 0px;
    }
    .dashboard_container.no-shadow .dashboard_container_body{
        padding: 20px;
    }
    .view-cv{
        position: absolute;
        right: 0px;
        /* top: 0px; */
        top: 50%;
        transform: translateY(-50%);
    }
    </style>
@endsection

@section('student_content')

<!-- Start Content Section -->
<div class="row align-items-center">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard_container">
            <div class="dashboard_container_body p-4">
                <div class="viewer_detail_wraps">

                    <a href="{{ route('guest.student.cv.resume', ['student_id_bin' => decbin($user->id), 'student_id_hex' => dechex($user->id)]) }}" target="_blank" class="btn btn-theme bg-ucap btn-sm float-right text-bold view-cv" data-toggle="tooltip" data-title="{{ __('View CV / Resume') }}">
                        {{-- <i class="ti-eye mr-1"></i> --}}
                        {{ __('View CV') }}
                    </a>
                    {{-- <div class="viewer_detail_thumb">
                        @if(!is_null($url = has_media($user->student, 'avatar', 'thumb')))
                        <img src="{{ show_image($url) }}" class="img-fluid" alt="{{ __('Please Upload Your Passport Size Photo.') }}">
                        @else
                        <img src="https://via.placeholder.com/500x500" class="img-fluid" alt="{{ __('Please Upload Your Passport Size Photo.') }}">
                        @endif
                    </div> --}}
                    <div class="caption">
                        {{-- <div class="viewer_package_status bg-ucap">{{ __('Joined About '.ago_time($user->created_at)) }}</div> --}}
                        <div class="viewer_header">
                            <h4>{{ $user->name }}</h4>
                            <span class="viewer_location">{{ optional($user->student)->address .', '. optional($user->student)->city .', '. optional($user->student)->state .', '. optional($user->student)->country }}</span>
                            <ul>
                                <li><strong>{{ $user->wishlists->count() }}</strong> {{ __('Favourites') }}</li>
                                <li><strong>{{ $applieds }}</strong> {{ __('Applied') }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



<div class="row">
    <div class="col-12">
        <div class="dashboard_container">
            <div class="dashboard_container_header">
                <div class="dashboard_fl_1 d-block">
                    <div class="row">
                        <div class="col-12">
                            {{-- <h4 class="pl-2 mt-0 mb-0 float-left">{{ __('Educational Qualifications') }}</h4> --}}
                            <h4 class="float-left text-bold">{{ __('Basic Information') }}</h4>
                            <a href="{{ route('student.settings.profile') }}" class="btn btn-theme bg-ucap btn-sm float-right text-bold">{{ __('Edit Info') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard_container_body p-4">
                <div class="row">
                    <div class="col-md-6">
                        <table class="table table-responsive-sm table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-left">{{ __('Full Name') }}</th>
                                    <td scope="row" class="text-left">
                                        <span class="text-bold text-capitalize">{{ $user->name }}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-left">{{ __('Gender') }}</th>
                                    <td scope="row" class="text-left">
                                        <span class="text-bold text-capitalize">{{ optional($user->student)->gender }}</span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-left">{{ __('Birthdate') }}</th>
                                    <td scope="row" class="text-left">
                                        <span class="text-bold">
                                            {{ get_date(optional($user->student)->dob) }}
                                            <sup class="text-ucap">{{ __('('. get_age(optional($user->student)->dob).' Years)') }}</sup>
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-left">{{ __('Native Language') }}</th>
                                    <td scope="row" class="text-left">
                                        <span class="text-bold"  id="show_native">
                                            {{ __('native language') }}
                                        </span>
                                        <div style="display: none;" id="native_language">
                                            @include('student.settings.apart.languages')
                                        </div>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-left">{{ __('Email ID') }}</th>
                                    <td scope="row" class="text-left">
                                        <span class="text-bold">
                                            {{ $user->email }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>


                    <div class="col-md-6">
                        <table class="table table-responsive-sm table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row" class="text-left">{{ __('Mobile Number') }}</th>
                                    <td scope="row" class="text-left">
                                        <span class="text-bold">
                                            {{ optional($user->student)->phone }}
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-left">{{ __('Country') }}</th>
                                    <td scope="row" class="text-left">
                                        <span class="text-bold">
                                            {{ optional($user->student)->country }}
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-left">{{ __('Province') }}</th>
                                    <td scope="row" class="text-left">
                                        <span class="text-bold">
                                            {{ optional($user->student)->state }}
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-left">{{ __('City') }}</th>
                                    <td scope="row" class="text-left">
                                        <span class="text-bold">
                                            {{ optional($user->student)->city }}
                                        </span>
                                    </td>
                                </tr>

                                <tr>
                                    <th scope="row" class="text-left">{{ __('Address') }}</th>
                                    <td scope="row" class="text-left">
                                        <span class="text-bold">
                                            {{ optional($user->student)->address }}
                                        </span>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard_container">
            <div class="dashboard_container_header">
                <div class="dashboard_fl_1 d-block">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="text-bold float-left">{{ __('Educational Qualifications') }}</h4>
                            <a href="{{ route('student.settings.education') }}" class="btn btn-theme bg-ucap btn-sm float-right text-bold">{{ __('Edit Qualification') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard_container_body p-4">
                <!-- Educational Qualification -->
                <div class="submit-section">
                    <div class="row">
                        @foreach ($user->educations as $data)
                        <div class="col-12">
                            <div class="form-row">
                                <div class="dashboard_container no-shadow mb-5">
                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="mb-0 text-center">{{ $data->level }}</h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="dashboard_container_body">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <table class="table table-responsive-sm table-bordered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="text-left">{{ __('Education Level') }}</th>
                                                            <td scope="row" class="text-left">
                                                                <span class="text-bold text-capitalize">{{ $data->level }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row" class="text-left">{{ __('Education Field') }}</th>
                                                            <td scope="row" class="text-left">
                                                                <span class="text-bold text-capitalize">{{ $data->field }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row" class="text-left">{{ __('Major Subject') }}</th>
                                                            <td scope="row" class="text-left">
                                                                <span class="text-bold text-capitalize">{{ $data->major_subject }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row" class="text-left">{{ __('Institute') }}</th>
                                                            <td scope="row" class="text-left">
                                                                <span class="text-bold text-capitalize">{{ $data->institute }}</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>

                                            <div class="col-md-6">
                                                <table class="table table-responsive-sm table-bordered mb-0">
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row" class="text-left">{{ __('Institute Address') }}</th>
                                                            <td scope="row" class="text-left">
                                                                <span class="text-bold text-capitalize">{{ $data->address }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row" class="text-left">{{ __('Starting Year') }}</th>
                                                            <td scope="row" class="text-left">
                                                                <span class="text-bold text-capitalize">{{ $data->start_year }}</span>
                                                            </td>
                                                        </tr>

                                                        @php
                                                            $endyear = 'Running';
                                                            $score = 'Running';
                                                            if($data->running == null){
                                                                $endyear = $data->end_year;
                                                                $score = $data->score;
                                                            }
                                                        @endphp

                                                        <tr>
                                                            <th scope="row" class="text-left">{{ __('Ending Year') }}</th>
                                                            <td scope="row" class="text-left">
                                                                <span class="text-bold text-capitalize">{{ $endyear }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row" class="text-left">{{ __('Score') }}</th>
                                                            <td scope="row" class="text-left">
                                                                <span class="text-bold text-capitalize">{{ $score }}</span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <!-- Educational Qualification -->
            </div>
        </div>
    </div>
</div>
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $(document).ready(function(){
            var selected = '{{ optional($user->student)->language }}';
            var lang = null;
            var options = $('#native_language').find('option').each(function(){
                if($(this).val()==selected){ // EDITED THIS LINE
                        lang = $(this).html();
                    }
            });
            $('#show_native').html(lang);
        });
    </script>
@endsection
