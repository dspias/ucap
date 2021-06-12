@extends('layouts.student.app')

@section('page_title', __('Programs'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .favourite {
        position: absolute;
        top: 20px;
        right: 40px;
    }
    .favourite a{
        font-size: 24px;
        transition: 0.3s all ease-in-out;
    }
    .favourite a:hover{
        font-size: 30px;
        transition: 0.3s all ease-in-out;
    }
    </style>
@endsection



@section('content')

<!-- Start Content Section -->
<!-- ========================== Featured Category Section =============================== -->
<section class="pb-2">
    <div class="container">

        <div class="row justify-content-center" style="margin-top: 0px;">
            <div class="col-md-8">
                <div class="sec-heading center">
                    <p>{{ __('Popular Programs') }}</p>
                    <h2>
                        {{ __('All Programs of ') }}
                        <span class="theme-cl">{{ __($faculty->name) }}</span>
                    </h2>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ========================== Featured Category Section =============================== -->


<!-- ============================ Find Courses with Sidebar ================================== -->
<section class="pt-0">
    <div class="container">
        <!-- Row -->
        <div class="row">
            <div class="col-md-12">

                <div class="row">
                    @php
                        $programs = $faculty->programs()->whereStatus(true)->paginate(20);
                    @endphp
                    @foreach($programs as $program)
                    <div class="col-md-6">
                        <div class="education_block_list_layout">
                            <div class="list_layout_ecucation_caption">

                                <div class="education_block_body">
                                    <h4 class="bl-title">
                                        <a href="{{ route('guest.program.show', ['program_id' => decbin(optional($program)->id), 'program_title' => optional($program)->short_name]) }}">{{ $program->name }}</a>
                                    </h4>
                                    <div class="course_rate_system">
                                        <div class="course_reviews_info">
                                            <strong class="high">{{ ucap_get('currency_sign').$program->application_fee }}</strong>({{ __('Foreign Applications') }})
                                        </div>
                                    </div>
                                    <div class="cources_price">{{ ucap_get('currency_sign').$program->yearly_fee }} / Per Year</div>
                                    <div class="course_rate_system">
                                        <div class="">
                                            <strong class="high">{{ monthyear($program->program_duration) }}</strong>({{ __('Years') }})
                                        </div>
                                    </div>
                                </div>

                                <div class="education_block_footer mt-3">
                                    <div class="education_block_author">
                                        <div class="path-img">
                                            <a href="{{ route('guest.university.show', ['id' => decbin(optional(optional($program->faculty)->university)->id), 'name' => get_name(optional(optional($program->faculty)->university)->name)]) }}">
                                                @if(!is_null($url = has_media(optional(optional($program->faculty)->university)->university, 'logo', 'thumb')))
                                                    <img src="{{ show_image($url) }}" class="img-fluid" alt="{{ __('University Logo Not Found.') }}" />
                                                @else
                                                <img src="https://via.placeholder.com/80x80" class="img-fluid" alt="">
                                                @endif
                                            </a>
                                        </div>
                                        <h5>
                                            <a href="{{ route('guest.university.show', ['id' => decbin(optional(optional($program->faculty)->university)->id), 'name' => get_name(optional(optional($program->faculty)->university)->name)]) }}">{{ optional(optional($program->faculty)->university)->name }}</a>
                                        </h5>
                                        @auth
                                        <div class="favourite">
                                            @php
                                                if(has_wishlist($program->id, auth()->user()->id)){
                                                    $text = 'Remove to Wishlist';
                                                    $icon = 'ti-heart-broken';
                                                } else{
                                                    $text = 'Add to Wishlist';
                                                    $icon = 'ti-heart';
                                                }
                                            @endphp
                                            <a href="{{ route('guest.program.changewishlist', ['program_id' => decbin($program->id)]) }}" class="text-ucap" data-toggle="tooltip" data-title="{{ $text }}">
                                                <i class="{{ $icon }}"></i>
                                            </a>
                                        </div>
                                        @endauth
                                    </div>
                                    <div class="cources_info_style3">
                                        <ul>
                                            <li>
                                                <a href="{{ route('guest.program.show', ['program_id' => decbin(optional($program)->id), 'program_title' => optional($program)->short_name]) }}" class="foot_lecture bg-ucap text-bold">
                                                    {{ __('Show Details To Apply') }}
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                            </div>

                        </div>
                    </div>
                    @endforeach
                </div>



                {{ $programs->links('extra.paginator') }}
            </div>

        </div>
        <!-- Row -->

    </div>
</section>
<!-- ============================ Find Courses with Sidebar End ================================== -->
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
