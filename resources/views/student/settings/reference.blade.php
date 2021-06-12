@extends('student.layouts.student')

@section('page_title', __('SETTINGS | Reference\'s'))

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
                            <h4 class="text-white float-left">{{ __('Reference\'s') }}</h4>
                            @if($references->count() < 2)
                            <a href="javascript:void(0);" data-toggle="modal" data-target="#addReference" class="btn btn-theme bg-ucap btn-sm float-right text-bold">{{ __('Add Reference') }}</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <div class="dashboard_container_body p-4">
                <!-- Language Qualification -->
                <div class="submit-section">
                    <div class="row">
                        @foreach ($references as $sl =>  $data)
                            <div class="col-12">
                                <div class="form-row">
                                    <div class="dashboard_container no-shadow mb-5">
                                        <div class="dashboard_container_header">
                                            <div class="dashboard_fl_1">
                                                <div class="row">

                                                    <div class="col-md-12">
                                                        <h6 class="mb-0 float-left">Reference {{ $sl+1 }}</h6>
                                                        <a href="javascript:void(0);" data-toggle="modal" data-target="#editReference" data-todo="{{ $data }}" class="btn btn-theme btn-sm float-right">
                                                            <i class="ti-pencil"></i>
                                                        </a>
                                                        <a href="{{ route('student.settings.reference.destroy', [$data->id]) }}" confirm="{{ __('Are You Sure Want To Delete?') }}" class="btn btn-theme bg-ucap btn-sm float-right mr-2 confirm">
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
                                                                <th scope="row" class="text-left">{{ __('Name') }}</th>
                                                                <td scope="row" class="text-left">
                                                                    <span class="text-bold text-capitalize text-ucap">{{ $data->first_name." ".$data->last_name }}</span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row" class="text-left">{{ __('Professional Designation') }}</th>
                                                                <td scope="row" class="text-left">
                                                                    <span class="text-bold text-ucap">{{ $data->professional_designation }}</span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row" class="text-left">{{ __('Company/Institution') }}</th>
                                                                <td scope="row" class="text-left">
                                                                    <span class="text-bold text-ucap">{{ $data->company_institution }}</span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row" class="text-left">{{ __('Email') }}</th>
                                                                <td scope="row" class="text-left">
                                                                    <span class="text-bold text-ucap">{{ $data->email }}</span>
                                                                </td>
                                                            </tr>

                                                            <tr>
                                                                <th scope="row" class="text-left">{{ __('Phone Number') }}</th>
                                                                <td scope="row" class="text-left">
                                                                    <span class="text-bold text-ucap">{{ $data->phone }}</span>
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


            @include('student.settings.modals.add_reference')
            @include('student.settings.modals.edit_reference')
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
            $('#individualCheckbox').click(function(){
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



        $('#editReference').on('shown.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var data = button.data('todo');
                var modal = $(this);
                modal.find('#reference_id').val(data.id);
                modal.find('#first_name').val(data.first_name);
                modal.find('#last_name').val(data.last_name);
                modal.find('#professional_designation').val(data.professional_designation);
                modal.find('#company_institution').val(data.company_institution);
                modal.find('#email').val(data.email);
                modal.find('#phone').val(data.phone);
            });
        });
    </script>
@endsection
