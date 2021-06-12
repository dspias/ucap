@extends('layouts.student.app')

@section('page_title', __('Advance Search'))

@section('css_links')
    {{--  External CSS  --}}
    <!-- Select2 css -->
    {{-- <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" /> --}}
    <!-- Datepicker css -->
    <link href="{{ asset('assets/plugins/datepicker/datepicker.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .select2-container--default .select2-results__option--highlighted[aria-selected] {
        background-color: #f40808;
        color: white;
        font-weight: bold;
    }
    </style>
@endsection



@section('content')
<!-- Start Content Section -->
<!-- ============================ Page Title Start================================== -->
<section class="page-title pb-5 pt-3">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="breadcrumbs-wrap">
                    <p class="text-muted">{{ __('Search Anything From Here') }}</p>
                    <h1 class="breadcrumb-title">{{ __('Advance') }} <span class="text-ucap">{{ __('Search') }}</span></h1>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->


<section class="pt-0">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header bg-ucap">
                      <h4 class="mb-0 text-white">{{ __('Advance Search') }}</h4>
                    </div>

                    <form action="{{ route('guest.program.index') }}" method="get">

                        <input type="hidden" name="order_by" value="low_to_high" class="order_by">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="province">{{ __('Select province') }}</label>
                                        <select class="select2-single form-control" name="province[]">

                                            <option value="" aria-disabled="true" >{{ __('Select Province *') }}</option>
                                            @foreach($provinces as $province)
                                            <option value="{{ $province->id }}" aria-disabled="true" >{{ $province->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="degree">{{ __('Select Level Of Study') }}</label>
                                        <select class="select2-single form-control" name="degree[]">
                                            <option value="" aria-disabled="true" >{{ __('Select Level Of Study *') }}</option>

                                            <option value="{{ 'diploma' }}">{{ 'Diploma' }}</option>
                                            <option value="{{ 'graduation' }}">{{ 'Graduation' }}</option>
                                            <option value="{{ 'post graduation' }}">{{ 'Post Graduation' }}</option>
                                            <option value="{{ 'phd' }}">{{ 'Phd' }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="scholarship">{{ __('Select Scholarship') }}</label>
                                        <select class="select2-single form-control" name="scholarship[]">
                                            <option value="" aria-disabled="true" >{{ __('Select Scholarship *') }}</option>
                                            <option value="Yes">{{ __('Yes') }}</option>
                                            <option value="No">{{ __('No') }}</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>{{ __('Course Name') }}</label>
                                        <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="{{ __('Ex: Computer Science *') }}">
                                    </div>
                                </div>

                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>{{ __('Session Starting Range') }}</label>
                                        <div class="input-group border-0">
                                            <input type="text" name="start_date" id="autoclose-date1" class="datepicker-here form-control @error('start_date') is-invalid @enderror" placeholder="yyyy-mm-dd" aria-describedby="basic-addon2" style="width: 45%;"/>

                                            <input type="button" value="To" class="form-control text-center text-bold text-white text-uppercase bg-ucap" readonly style="width: 5%; margin: 0px auto; display: block;">

                                            <input type="text" name="end_date" id="autoclose-date2" class="datepicker-here form-control @error('end_date') is-invalid @enderror" placeholder="yyyy-mm-dd" aria-describedby="basic-addon2" style="width: 45%;"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-custom bg-ucap float-right text-bold mb-3" type="submit">
                                <i class="ti-search mr-2"></i>
                                {{ __('Search') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Content Section -->
@endsection



@section('script_links')
    {{--  External Javascript Links --}}
    <!-- Select2 js -->
    {{-- <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script> --}}
    <!-- Datepicker JS -->
    {{-- <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script> --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <!-- Datepicker JS -->
    <script src="{{ asset('assets/plugins/datepicker/datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/datepicker/i18n/datepicker.en.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-datepicker.js') }}"></script>

    <script>
        // Custom Script Here
        $(document).ready(function() {
            /* -- Form Select - Select2 -- */
            $('.select2-single').select2();
        });

        $('.datepicker-here').datepicker({
            language: 'en',
            autoClose: true,
            dateFormat: 'yyyy-mm-dd',
        });
    </script>
@endsection
