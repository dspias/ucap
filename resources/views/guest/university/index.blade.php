@extends('layouts.student.app')

@section('page_title', __('Universites'))

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

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <p>{{ __('Popular Universities') }}</p>
                    <h2>
                        {{ __('All') }}
                        <span class="theme-cl">{{ __('Universities') }}</span>
                    </h2>
                </div>
            </div>
        </div>

        <!-- Onclick Sidebar -->
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div id="filter-sidebar" class="filter-sidebar">
                    <div class="filt-head">
                        <h4 class="filt-first">Advance Options</h4>
                        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">Close <i class="ti-close"></i></a>
                    </div>
                    <div class="show-hide-sidebar">

                        <!-- Find New Property -->
                        <form action="{{ route('guest.university.index') }}" class="form-inline addons mb-3">
                            <div class="sidebar-widgets">

                                <!-- Search Form -->
                                <input class="form-control" type="search" name="name" value="{{ $selected['name'] ?? old('name') }}" placeholder="Search University" aria-label="Search">

                                <h4 class="side_title mt-3">{{ __('Provinces of CANADA') }}</h4>
                                <ul class="no-ul-list mb-3">
                                    @foreach($provinces as $province)
                                    <li>
                                        <input id="province_mobile_{{ $province->id }}" class="checkbox-custom" name="province[]" value="{{ $province->id }}" type="checkbox" @if(has_field($selected['province'], $province->id))checked @endif>
                                        <label for="province_mobile_{{ $province->id }}" class="checkbox-custom-label">{{ $province->name }}</label>
                                    </li>
                                    @endforeach
                                </ul>
                                <button class="btn btn-theme full-width mb-2">Filter Result</button>

                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>

        <!-- Row -->
        <div class="row">

            <div class="col-lg-4 col-md-12 col-sm-12 order-2 order-lg-1 order-md-2">
                <form action="{{ route('guest.university.index') }}">
                    <div class="page_sidebar hide-23">

                        <!-- Search Form -->
                        <input class="form-control" type="search" name="name" value="{{ $selected['name'] ?? old('name') }}" placeholder="Search University" aria-label="Search">

                        <h4 class="side_title mt-3">{{ __('Provinces of CANADA') }}</h4>
                        <ul class="no-ul-list mb-3">
                            @foreach($provinces as $province)
                            <li>
                                <input id="province_{{ $province->id }}" class="checkbox-custom" name="province[]" value="{{ $province->id }}" type="checkbox" @if(has_field($selected['province'], $province->id))checked @endif>
                                <label for="province_{{ $province->id }}" class="checkbox-custom-label">{{ $province->name }}</label>
                            </li>
                            @endforeach
                        </ul>

                        <button class="btn btn-theme full-width mb-2">{{ __('Filter Results') }}</button>

                    </div>
                </form>
            </div>

            <div class="col-lg-8 col-md-12 col-sm-12 order-1 order-lg-2 order-md-1">

                <!-- Row -->
                <div class="row align-items-center mb-3">
                    <div class="col-lg-6 col-md-6 col-sm-12">
                        {{ __('Total Founded Universites') }} <strong><b>{{ $universities->count() }}</b></strong>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-12 ordering">
                        <div class="filter_wraps">
                            <div class="dn db-991 mt30 mb0 show-23">
                                <div id="main2">
                                    <a href="javascript:void(0)" class="btn btn-theme arrow-btn filter_open" onclick="openNav()" id="open2">Show Filter<span><i class="fas fa-arrow-alt-circle-right"></i></span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Row -->

                <div class="row">
                    <!-- Filters -->
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                        <div class="education_block_list_layout">

                            <div class="popular_tags">
                                <!-- Tags -->
                                <form action="{{ route('guest.university.index') }}" id="tag-submit">
                                    <div class="tag_cloud">
                                        @if(!is_null($selected['name']))
                                        <a href="javascript:void(0);" class="tag-cloud-lin"  style="background-color: #f40808; color: #fff;">
                                            <span class="filter-name">{{ $selected['name'] }}</span>
                                            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
                                            <input type="hidden" name="name" value="{{ $selected['name'] }}" id="">
                                        </a>
                                        @endif
                                        @foreach($selected['province'] as $value)
                                        <a href="javascript:void(0);" class="tag-cloud-lin" style="background-color: #f40808; color: #fff;">
                                            <span class="filter-title">{{ optional($provinces->find($value))->name }}</span>
                                            <i class="ti-close pl-1 tags" style="font-size: 10px;"></i>
                                            <input type="hidden" name="province[]" id="" value="{{ $value }}">
                                        </a>
                                        @endforeach
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>

                    @foreach($universities as $university)
                    <div class="col-lg-6">
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
                                    <li>
                                        <i class="ti-location-arrow"></i>
                                        {{ optional(optional(optional($university->university)->city)->state)->name }}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                <!-- Row -->
                {{ $universities->appends(request()->query())->links('extra.paginator') }}
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
            });
		</script>
    <script>
        // Custom Script Here
    </script>
@endsection
