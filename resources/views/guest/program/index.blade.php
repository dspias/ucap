@extends('layouts.student.app')

@section('page_title', __('Programs'))

@section('css_links')
    {{--  External CSS  --}}

    <!-- Datepicker css -->
    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
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

    .compare {
        position: absolute;
        top: 18px;
        right: 70px;
    }
    .compare a .compare-icon{
        border: 1px solid #f40808;
        padding: 0px 5px 5px 5px;
        border-radius: 100% !important;
        font-size: 22px;
        transition: 0.5s all ease-in-out;
    }
    .compare a:hover .compare-icon{
        border: 1px solid #f40808;
        padding: 0px 5px 5px 5px;
        border-radius: 100% !important;
        font-size: 22px;
        background: #f40808;
        color: #fff;
        transition: 0.5s all ease-in-out;
    }
    .compare a sup{
        left: -10px;
    }
    .compare a .add-compare{
        font-size: 16px;
        padding: 0px 1px;
        background-color: #f40808;
        color: #fff;
        border-radius: 100px !important;
        border: 1px solid #f40808;
        transition: 0.5s all ease-in-out;
    }
    .compare a:hover .add-compare{
        font-size: 16px;
        padding: 0px 1px;
        background-color: #ffffff;
        color: #f40808;
        border-radius: 100px !important;
        border: 1px solid #f40808;
        transition: 0.5s all ease-in-out;
    }
    .compare a .remove-compare{
        font-size: 16px;
        padding: 0px 1px;
        background-color: #f40808;
        color: #fff;
        border-radius: 100px !important;
        border: 1px solid #f40808;
        transition: 0.5s all ease-in-out;
    }
    .compare a:hover .remove-compare{
        font-size: 16px;
        padding: 0px 1px;
        background-color: #ffffff;
        color: #f40808;
        border-radius: 100px !important;
        border: 1px solid #f40808;
        transition: 0.5s all ease-in-out;
    }


    .program-cost tr td, .program-cost tr th{
        border: 0px solid #fff !important;
        padding: 0px;
        padding-bottom: 8px;
        font-size: 16px;
    }

    p.badge.badge-dark.program-level.text-capitalize {
        padding: 3px 7px;
        font-size: 10px;
        font-weight: bold;
        border: 1px solid #647b9c;
        background: transparent;
        color: #647b9c;
        /* cursor: pointer; */
    }

    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #f40808;
        color: white;
    }

    .path-img{
        border-radius: 50px !important;
    }

    /* // Extra small devices (portrait phones, less than 576px) */
    @media (min-width: 300px) and (max-width: 575.98px) {
        .select2-container{
            width: 200px !important;
        }
    }

    /* // Small devices (landscape phones, 576px and up) */
    @media (min-width: 576px) and (max-width: 767.98px) {
        .select2-container{
            width: 200px !important;
        }
    }

    /* // Medium devices (tablets, 768px and up) */
    @media (min-width: 768px) and (max-width: 991.98px) {
        .select2-container{
            width: 200px !important;
        }
    }

    /* // Large devices (desktops, 992px and up) */
    @media (min-width: 992px) and (max-width: 1199.98px) {
        .select2-container{
            width: 200px !important;
        }
    }

    /* // Extra large devices (large desktops, 1200px and up) */
    @media (min-width: 1200px) {
        .select2-container{
            width: 200px !important;
        }
    }
    </style>
@endsection

@php
    function has_field($list, $value){
        foreach($list as $item) if($value == $item) return true;

        return false;
    }
@endphp


@section('content')

<!-- Start Content Section -->
<!-- ============================ Find Programs with Sidebar ================================== -->
<section class="pt-30">
    <div class="container">

        <!-- Onclick Sidebar -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div id="filter-sidebar" class="filter-sidebar">
                    <div class="filt-head">
                        <h4 class="filt-first">{{ __('Advance Options') }}</h4>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">{{ __('Close') }} <i class="ti-close"></i></a>
                    </div>
                    <div class="show-hide-sidebar">
                        {{-- Mobile Filter --}}
                        @include('guest.program.partials.mobile_filter')
                    </div>
                </div>
            </div>
        </div>

        <!-- Row -->
        <div class="row">

            <div class="col-lg-4 col-md-12 col-sm-12 order-2 order-lg-1 order-md-2">
                {{-- Filter --}}
                @include('guest.program.partials.filter')
            </div>

            <div class="col-lg-8 col-md-12 col-sm-12 order-1 order-lg-2 order-md-1">

                <!-- Row -->
                <div class="row align-items-center mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        {{ __('Total Founded Programs') }} <strong><b>{{ $programs->count() }}</b></strong>
                    </div>

                    <div class="col-lg-6 col-md-6 col-sm-12 ordering">
                        <div class="filter_wraps">
                            <select id="filter_by" class="form-control">
                                <option value="" aria-disabled="">{{ __('Filter By') }}</option>
                                <optgroup label="{{ __('Price') }}">
                                    <option value="low_to_high" @if($selected['order_by'] == 'low_to_high')selected @endif>Low to High</option>
                                    <option value="high_to_low" @if($selected['order_by'] == 'high_to_low')selected @endif>High to Low</option>
                                    <option value="start_date" @if($selected['order_by'] == 'start_date')selected @endif>By Start Date</option>
                                </optgroup>
                            </select>
                        </div>
                    </div>
                </div>
                <!-- /Row -->

                <div class="row">
                    <!-- Filters -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="education_block_list_layout">

                            <div class="popular_tags">
                                <!-- Filter Tags -->
                                @include('guest.program.partials.filter_tags')
                            </div>

                        </div>
                    </div>


                    @foreach($programs as $program)
                    <div class="col-md-12">
                        <div class="education_block_list_layout pb-0">
                            <div class="list_layout_ecucation_caption">

                                <div class="education_block_body">
                                    <h4 class="text-black">
                                        <a href="{{ route('guest.program.show', ['program_id' => decbin(optional($program)->id), 'program_title' => optional($program)->short_name]) }}">{{ $program->name }}</a>
                                    </h4>
                                    <p class="badge badge-dark program-level text-capitalize">{{ $program->level }}</p>
                                    <div class="row pt-3 program-cost">
                                        {{-- <div class="col-md-6 pb-2">
                                            {{ show_char($program->program_overview, 170) }}
                                        </div> --}}
                                        <div class="col-md-6">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    <tr>
                                                        <th class="text-left">{{ __('Approximate Cost: ') }}</th>
                                                        <td class="text-right text-dark text-bold">{{ ucap_get('currency_sign').$program->yearly_fee }} <sup class="text-muted">{{ __('(Per Year)') }}</sup></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left">{{ __('Application Fee: ') }}</th>
                                                        <td class="text-right text-dark text-bold">{{ ucap_get('currency_sign').$program->application_fee }} <sup class="text-muted">{{ __('(Foreign Student)') }}</sup></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left">{{ __('Program Duration: ') }}</th>
                                                        <td class="text-right text-dark text-bold">{{ monthyear($program->program_duration) }} {{ __('Year\'s') }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                        <div class="col-md-6">
                                            <table class="table table-borderless">
                                                <tbody>
                                                    @php
                                                        $sessions = upcomming_sessions($program);
                                                    @endphp
                                                    @foreach ($sessions as $session)
                                                    <tr>
                                                        <th class="text-left">{{ __('Upcoming Session: ') }}</th>
                                                        <td class="text-right text-dark text-bold">{{ get_date($session->session_start, 'd M, Y') }}</sup></td>
                                                    </tr>
                                                    <tr>
                                                        <th class="text-left">{{ __('Apply Before: ') }}</th>
                                                        <td class="text-right text-dark text-bold">{{ get_date($session->application_deadline, 'd M, Y') }}</sup></td>
                                                    </tr>
                                                    @php
                                                        break;
                                                    @endphp
                                                    @endforeach
                                                    @if(!is_null($program->website))
                                                    <tr>
                                                        <th class="text-left">{{ __('University Website ') }}</th>
                                                        <td class="text-right text-dark text-bold">
                                                            <a href="{{ $program->website }}" target="_blank" class="text-ucap text-bold">{{ __('Visit') }}</a>
                                                        </td>
                                                    </tr>
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="education_block_footer pl-0 pr-0">
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
                                                <a href="{{ route('guest.university.show', ['id' => decbin(optional(optional($program->faculty)->university)->id), 'name' => get_name(optional(optional($program->faculty)->university)->name)]) }}">{{ optional(optional($program->faculty)->university)->name }}</a> <br>

                                                <a href="{{ route('guest.country.show', ['id' => decbin(optional(optional(optional(optional(optional(optional($program->faculty)->university)->university)->city)->state)->country)->id), 'name' => get_name(optional(optional(optional(optional(optional(optional($program->faculty)->university)->university)->city)->state)->country)->slug)]) }}">
                                                    {{-- <span class="country-name">
                                                        {{ optional(optional(optional(optional(optional(optional($program->faculty)->university)->university)->city)->state)->country)->name }}
                                                    </span> --}}
                                                    <span class="state-name">
                                                        {{ optional(optional(optional(optional($program->faculty)->university)->university)->city)->state->name }}
                                                    </span>
                                                </a>
                                            </h5>

                                            {{-- @auth --}}
                                            <div class="favourite">
                                                @php
                                                    if(has_wishlist($program->id)){
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

                                            <div class="compare">
                                                @if(!Compare::match($program->id))
                                                <a href="{{ route('student.compare.addremove', ['program_id' => decbin($program->id)]) }}" class="text-ucap" data-toggle="tooltip" data-title="{{ __('Add for Comparison') }}">
                                                    <i class="typcn typcn-flow-merge compare-icon"></i>
                                                    <sup><i class="feather icon-plus add-compare"></i></sup>
                                                </a>
                                                @else
                                                <a href="{{ route('student.compare.addremove', ['program_id' => decbin($program->id)]) }}" class="text-ucap" data-toggle="tooltip" data-title="{{ __('Remove from Comparison') }}">
                                                    <i class="typcn typcn-flow-merge compare-icon"></i>
                                                    <sup><i class="feather icon-minus remove-compare"></i></sup>
                                                </a>
                                                @endif
                                            </div>
                                            {{-- @endauth --}}
                                        </div>
                                        <div class="cources_info_style3">
                                            <ul>
                                                <li>
                                                    <a href="{{ route('guest.program.show', ['program_id' => decbin(optional($program)->id), 'program_title' => optional($program)->short_name]) }}" class="foot_lecture bg-ucap text-bold text-uppercase">
                                                        {{ __('Apply') }}
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach

                <!-- Row -->
                {{ $programs->appends(request()->query())->links('extra.paginator') }}
                <!-- /Row -->

            </div>

        </div>
        <!-- Row -->

    </div>
</section>
<!-- ============================ Find Programs with Sidebar End ================================== -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}

@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
		<!-- ============================================================== -->
		<!-- This page plugins -->
		<!-- ============================================================== -->

    <!-- Datepicker JS -->
    <script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-datepicker.js') }}"></script>

		<script>
			function openNav() {
			  document.getElementById("filter-sidebar").style.width = "320px";
			}

			function closeNav() {
			  document.getElementById("filter-sidebar").style.width = "0";
			}

            $(document).ready(function(){
                $('.tags').click(function(){
                    var link = $(this).parent();
                    link.remove();
                    $('#tag-submit').submit();
                });
                $('#filter_by').change(function(){
                    var value = $(this).val();
                    $('.order_by').val(value);
                    $('#tag-submit').submit();
                });
            });
		</script>
    <script>
        // Custom Script Here
        // filter_by
        $('#filter_by').select2({
            placeholder: "Filter By",
            allowClear: true
        });


        $('.datepicker-here').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'yyyy-mm-dd',
        });

        let start_date = '{{ $selected["start_date"] }}';
        if(start_date != "" && typeof(start_date) != 'undefined'){
            $('#autoclose-date1').datepicker().data('datepicker').selectDate(new Date(start_date));
            $('#autoclose-date3').datepicker().data('datepicker').selectDate(new Date(start_date));
        }

        let end_date = '{{ $selected["end_date"] }}';
        if(end_date != "" && typeof(end_date) != 'undefined'){
            $('#autoclose-date2').datepicker().data('datepicker').selectDate(new Date(end_date));
            $('#autoclose-date4').datepicker().data('datepicker').selectDate(new Date(end_date));
        }
    </script>
@endsection
