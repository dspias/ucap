@extends('student.layouts.student')

@section('page_title', __('SETTINGS | Education'))

@section('css_links')
    {{--  External CSS  --}}
    <link href="{{ asset('assets/css/telephone/intlTelInput.min.css') }}" rel="stylesheet" type="text/css">
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .iti{
        display: block !important;
    }
    .dashboard_container.no-shadow{
        border: 1px solid #f7f7f7;
        border-radius: 0px;
    }
    .dashboard_container.no-shadow .dashboard_container_body{
        padding: 20px;
    }
    </style>
@endsection

@section('student_content')

<!-- Start Content Section -->
<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12">
        <div class="dashboard_container">
            <div class="dashboard_container_header bg-dark">
                <div class="dashboard_fl_1 d-block">
                    <div class="row">
                        <div class="col-12">
                            {{-- <h4 class="pl-2 mt-0 mb-0 float-left">{{ __('Educational Qualifications') }}</h4> --}}
                            <h4 class="text-white float-left">{{ __('Update Educational Qualifications of '. auth()->user()->name) }}</h4>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#addNewQualification" class="btn btn-theme bg-ucap btn-sm float-right text-bold">{{ __('Add Qualification') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard_container_body p-4">
                <!-- Educational Qualification -->
                <div class="submit-section">
                    <div class="row">
                        @foreach ($educations as $data)
                        <div class="col-12">
                            <div class="form-row">
                                <div class="dashboard_container no-shadow mb-5">
                                    <div class="dashboard_container_header">
                                        <div class="dashboard_fl_1">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <h6 class="mb-0 float-left">{{ $data->level }}</h6>
                                                    <a href="javascript:void(0);" data-toggle="modal" data-target="#editQualification" data-todo="{{ $data }}" class="btn btn-theme btn-sm float-right">
                                                        <i class="ti-pencil"></i>
                                                    </a>
                                                    <a href="{{ route('student.settings.education.destroy', [$data->id]) }}" confirm="{{ __('Are You Sure Want To Delete?') }}" class="btn btn-theme bg-ucap btn-sm float-right mr-2 confirm">
                                                        <i class="ti-trash"></i>
                                                    </a>
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
                                                            <th scope="row" class="text-center">{{ __('Education Level') }}</th>
                                                            <td scope="row" class="text-center">
                                                                <span class="text-bold text-capitalize">{{ $data->level }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row" class="text-center">{{ __('Education Field') }}</th>
                                                            <td scope="row" class="text-center">
                                                                <span class="text-bold text-capitalize">{{ $data->field }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row" class="text-center">{{ __('Major Subject') }}</th>
                                                            <td scope="row" class="text-center">
                                                                <span class="text-bold text-capitalize">{{ $data->major_subject }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row" class="text-center">{{ __('Institute') }}</th>
                                                            <td scope="row" class="text-center">
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
                                                            <th scope="row" class="text-center">{{ __('Institute Address') }}</th>
                                                            <td scope="row" class="text-center">
                                                                <span class="text-bold text-capitalize">{{ $data->address }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row" class="text-center">{{ __('Starting Year') }}</th>
                                                            <td scope="row" class="text-center">
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
                                                            <th scope="row" class="text-center">{{ __('Ending Year') }}</th>
                                                            <td scope="row" class="text-center">
                                                                <span class="text-bold text-capitalize">{{ $endyear }}</span>
                                                            </td>
                                                        </tr>

                                                        <tr>
                                                            <th scope="row" class="text-center">{{ __('Score') }}</th>
                                                            <td scope="row" class="text-center">
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


            @include('student.settings.modals.add_education')
            @include('student.settings.modals.edit_education')
        </div>
    </div>
</div>
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}

    {{-- <script src="{{ asset('assets/js/telephone/intlTelInput.js') }}"></script> --}}

    {{-- Country State City API --}}
    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="//geodata.solutions/includes/countrystatecity.js"></script> --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // var input = document.querySelector("#phone");
        // window.intlTelInput(input, {
        // // allowDropdown: false,
        // // autoHideDialCode: false,
        // // autoPlaceholder: "off",
        // // dropdownContainer: document.body,
        // // excludeCountries: ["us"],
        // // formatOnDisplay: false,
        // // geoIpLookup: function(callback) {
        // //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
        // //     var countryCode = (resp && resp.country) ? resp.country : "";
        // //     callback(countryCode);
        // //   });
        // // },
        // // hiddenInput: "full_number",
        // // initialCountry: "auto",
        // // localizedCountries: { 'de': 'Deutschland' },
        // // nationalMode: false,
        // // onlyCountries: ['us', 'gb', 'ch', 'ca', 'do'],
        // // placeholderNumberType: "MOBILE",
        // // preferredCountries: ['cn', 'jp'],
        // // separateDialCode: true,
        // utilsScript: "{{ asset('assets/js/telephone/utils.js') }}",
        // });

        $('#studying').click(function(){
            if($(this).is(':checked')){
                $('#end_year').removeAttr('required');
                $('#end_year').attr('disabled', 'disabled');

                $('#score').removeAttr('required');
                $('#score').attr('disabled', 'disabled');
            } else{
                $('#end_year').removeAttr('required');
                $('#end_year').attr('required', true);
                $('#end_year').removeAttr('disabled');

                $('#score').removeAttr('required');
                $('#score').attr('required', true);
                $('#score').removeAttr('disabled');
            }
        });

        $('#edit_studying').click(function(){
            if($(this).is(':checked')){
                $('#edit_end_year').removeAttr('required');
                $('#edit_end_year').attr('disabled', 'disabled');
                $('#edit_end_year').val(null);

                $('#edit_score').removeAttr('required');
                $('#edit_score').attr('disabled', 'disabled');
                $('#edit_score').val(null);
            } else{
                $('#edit_end_year').removeAttr('required');
                $('#edit_end_year').attr('required', true);
                $('#edit_end_year').removeAttr('disabled');

                $('#edit_score').removeAttr('required');
                $('#edit_score').attr('required', true);
                $('#edit_score').removeAttr('disabled');
            }
        });

        $('#editQualification').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('todo');
                var modal = $(this);
                modal.find('#edit_level option').each(function(){
                    if($(this).val()==data.level){ // EDITED THIS LINE
                        $(this).attr("selected","selected");
                    }
                });
                modal.find('#education_id').val(data.id);
                modal.find('#edit_field').val(data.field);
                modal.find('#edit_major_subject').val(data.major_subject);
                modal.find('#edit_institute').val(data.institute);
                modal.find('#edit_address').val(data.address);
                modal.find('#edit_start_year').val(data.start_year);
                if(data.running != 1){
                    modal.find('#edit_end_year').val(data.end_year);
                    modal.find('#edit_score').val(data.score);
                } else{
                    $('#edit_end_year').removeAttr('required');
                    $('#edit_end_year').attr('disabled', 'disabled');

                    $('#edit_score').removeAttr('required');
                    $('#edit_score').attr('disabled', 'disabled');
                    modal.find('#edit_studying').attr('checked', 'checked');
                }
                // modal.find('#update_city').val(data.name);
            });
    </script>
@endsection
