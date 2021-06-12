@extends('layouts.student.app')

@section('page_title', __('Popular Faculties'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .edu_cat_icons img {
        max-width: 80px;
        width: 80px;
        height: 80px;
        border-radius: 100%;
    }
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
                    <p>{{ __('Popular faculties') }}</p>
                    <h2>
                        <span class="theme-cl">{{ __('Hot & Popular') }}</span>
                        {{ __('Faculties') }}
                    </h2>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($faculties as $item => $faculty)
                <div class="col-lg-4 col-md-4 col-sm-6">
                    <div class="edu_cat_2 cat-{{ rand(1,10) }}">
                        <div class="edu_cat_icons">
                            <a class="pic-main" href="{{ route('guest.university.show', ['id' => decbin(optional($faculty->university)->id), 'name' => get_name(optional($faculty->university)->name)]) }}" data-toggle="tooltip" data-title="{{ __('View The University of This Faculty') }}">
                                @if(!is_null($url = has_media(optional($faculty->university)->university, 'logo', 'thumb')))
                                    <img src="{{ show_image($url) }}" class="img-fluid" alt="{{ __('University Logo Not Found.') }}" />
                                @else
                                    <img src="https://via.placeholder.com/700x700" class="img-fluid" alt="{{ __('University Logo Not Found.') }}" />
                                @endif
                            </a>
                        </div>
                        <div class="edu_cat_data">
                            <h3 class="title" data-toggle="tooltip" data-title="{{ __('View This Faculty') }}">
                                <a href="{{ route('guest.faculty.show', ['faculty_id' => decbin($faculty->id), 'faculty_name' => get_name($faculty->name)]) }}">{{ __($faculty->name) }}</a>
                            </h3>
                            <p class="title" data-toggle="tooltip" data-title="{{ __('View This Faculty') }}">
                                <a href="{{ route('guest.university.show', ['id' => decbin(optional($faculty->university)->id), 'name' => get_name(optional($faculty->university)->name)]) }}">{{ __(optional($faculty->university)->name) }}</a>
                            </p>
                            <p class="text-bold">{{ __('Active Programs: ') }}{{ count($faculty->programs) }}</p>
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
