@extends('layouts.student.app')

@section('page_title', __('Popular Countries'))

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
                    <p>{{ __('Popular Countries') }}</p>
                    <h2>
                        <span class="theme-cl">{{ __('Hot & Popular') }}</span>
                        {{ __('Countries') }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($countries as $item => $country)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="edu_cat_2 cat-{{ rand(1,10) }}">
                        <div class="edu_cat_icons">
                            <a class="pic-main" href="{{ route('guest.country.show', ['id' => decbin($country->id), 'name' => $country->slug]) }}">
                                @if(!is_null($url = has_media($country, 'flag', 'thumb')))
                                    <img src="{{ show_image($url) }}" class="img-fluid" alt="">
                                    @else
                                    <img src="https://via.placeholder.com/700x700" class="img-fluid" alt="">
                                    @endif
                            </a>
                        </div>
                        <div class="edu_cat_data">
                            <h3 class="title"><a href="{{ route('guest.country.show', ['id' => decbin($country->id), 'name' => $country->slug]) }}">{{ __($country->name) }}</a></h3>
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
