@extends('layouts.student.app')

@section('page_title', __('Popular Universities'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection



@section('content')

<!-- Start Content Section -->
<!-- ========================== Featured Category Section =============================== -->
<section>
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <h2>
                        {{ __('Why ') }}
                        <span class="theme-cl">{{ __($country->name) }}?</span>
                    </h2>
                    <p>{{ __('Why you should choose '. $country->name) }}</p>
                </div>
            </div>

            <div class="col-12">
                {!! $country->note !!}
            </div>
        </div>

        <div class="row justify-content-center" style="margin-top: 50px;">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>{{ __('Popular Universities') }}</p>
                    <h2>
                        {{ __('Universities of ') }}
                        <span class="theme-cl">{{ __($country->name) }}</span>
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($universities as $item => $university)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="edu_cat_2 cat-{{ rand(1,10) }}">
                        <div class="edu_cat_icons">
                            <a class="pic-main" href="{{ route('guest.university.show', ['id' => decbin($university->id), 'name' => get_name($university->name)]) }}">
                                @if(!is_null($url = has_media($university->university, 'logo', 'thumb')))
                                <img src="{{ show_image($url) }}" class="img-fluid" alt="">
                                @else
                                <img src="https://via.placeholder.com/500x500" class="img-fluid" alt="">
                                @endif
                            </a>
                        </div>
                        <div class="edu_cat_data">
                            <h3 class="title"><a href="{{ route('guest.university.show', ['id' => decbin($university->id), 'name' => get_name($university->name)]) }}">{{ $university->name }}</a></h3>
                            <ul class="meta">
                                <li class="video">
                                    <i class="ti-location-arrow"></i>
                                    {{ $country->name }}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

    </div>
</section>
<!-- ========================== Featured Category Section =============================== -->
<!-- End Content Section -->

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
