@extends('student.layouts.student')

@section('page_title', __('SETTINGS | Language Certification'))

@section('css_links')
    {{--  External CSS  --}}
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
                            <h4 class="text-white float-left">{{ __('Update Language Certifications of '. auth()->user()->name) }}</h4>
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#addLanguage" class="btn btn-theme bg-ucap btn-sm float-right text-bold">{{ __('Add Certification') }}</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard_container_body p-4">
                <!-- Language Qualification -->
                <div class="submit-section">
                    <div class="row">
                        @foreach ($certificates as $data)
                            <div class="col-12">
                                <div class="form-row">
                                    <div class="dashboard_container no-shadow mb-5">
                                        <div class="dashboard_container_header">
                                            <div class="dashboard_fl_1">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h6 class="mb-0 float-left">{{ optional($data->language)->name }}</h6>
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#editLanguage" data-todo="{{ $data }}" class="btn btn-theme btn-sm float-right">
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                        <a href="{{ route('student.settings.language.destroy', ['id' => $data->id]) }}" confirm="{{ __('Are You Sure Want To Delete?') }}" class="btn btn-theme bg-ucap btn-sm float-right mr-2 confirm">
                                                            <i class="ti-trash"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="dashboard_container_body">
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <table class="table table-responsive-sm table-bordered mb-0">
                                                        <tbody>
                                                            <tr>
                                                                <th scope="row" class="text-center">{{ __('Language Certificate') }}</th>
                                                                <td scope="row" class="text-center">
                                                                    <span class="text-bold text-capitalize text-ucap">{{ optional($data->language)->name }}</span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row" class="text-center">{{ __('Band Score') }}</th>
                                                                <td scope="row" class="text-center">
                                                                    <span class="text-bold text-capitalize text-ucap">{{ $data->band }}</span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row" class="text-center">{{ __('Details') }}</th>
                                                                <td scope="row" class="text-center">
                                                                    <ul class="text-bold">
                                                                        <span class="text-ucap">{{ $data->details }}</span>
                                                                    </ul>
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
                <!-- Language Qualification -->
            </div>


            @include('student.settings.modals.add_language')
            @include('student.settings.modals.edit_language')
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
        // Custom CSS
        $(document).ready(function(){
            $('#individual').click(function(){
                var inputs = $('#individualInputs');
                var input = $('.individual-input');
                if($(this).prop("checked") == true && $(this).is(":checked")){
                    inputs.removeClass('d-none');
                    input.attr('required', true);
                }
                else if($(this).prop("checked") == false && $(this).is(":not(:checked)")){
                    inputs.addClass('d-none');
                    input.removeAttr('required');
                }
            });

            $('#edit_individual').click(function(){
                var inputs = $('#edit_individualInputs');
                var input = $('.individual-input');
                if($(this).prop("checked") == true && $(this).is(":checked")){
                    inputs.removeClass('d-none');
                    input.attr('required', true);
                }
                else if($(this).prop("checked") == false && $(this).is(":not(:checked)")){
                    inputs.addClass('d-none');
                    input.removeAttr('required');
                }
            });



            $('#editLanguage').on('shown.bs.modal', function (event) {
                    var button = $(event.relatedTarget);
                    var data = button.data('todo');
                    var modal = $(this);
                    modal.find('#language_id').val(data.id);
                    modal.find('#language_id option').each(function(){
                        if($(this).val()==data.language_id){ // EDITED THIS LINE
                            $(this).attr("selected","selected");
                        }
                    });
                    modal.find('#band').val(data.band);
                    modal.find('#details').val(data.details);
                    if(data.individual == true){
                        modal.find('#edit_individual').prop("checked", "checked");
                        modal.find('#edit_individualInputs').removeClass('d-none');
                    }
            });
        });
    </script>
@endsection
