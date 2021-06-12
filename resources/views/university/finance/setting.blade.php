@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Settings'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    /* .form-control[target="_blank"]{ */
    .form-control:read-only,
    .form-control:disabled,
    .form-control[readonly]{
        color: #000000;
        background-color: #fefefe;
        border-color: #f7f7f7 !important;
    }
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Settings') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Finance') }}</li>
    <li class="breadcrumb-item active">{{ __('Settings') }}</li>
@endsection


@section('action')
    <button class="btn btn-custom" onClick="window.location.reload();">
        <i class="feather icon-refresh-cw mr-1"></i>
        {{ __('Refresh') }}
    </button>
@endsection



@section('content')

<!-- Start row -->
<div class="row justify-content-center">
    <!-- Start col -->
    <div class="col-md-6">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 class="card-title text-bold text-center">{{ __('Bank Account Details') }}</h4>
            </div>
            <form action="#" method="post">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="account_name">{{ __('Account Name') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" readonly disabled value="{{ old('account_name') }}" name="account_name" placeholder="Ex: Mr. John Doe" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="bank_name">{{ __('Bank Name') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" readonly disabled value="{{ old('bank_name') }}" name="bank_name" placeholder="Ex: Bank of Canada" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="account_number">{{ __('Account Number') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" readonly disabled value="{{ old('account_number') }}" name="account_number" placeholder="Ex: 12234455687688" required>
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <a href="javascript:void(0);" id="editInfo" confirm-edit="{{ __('Are you sure want to edit this informations?') }}" class="btn btn-custom bg-ucap text-bold">
                            {{ __('Edit') }}
                        </a>
                        <a href="javascript:void(0);" id="cancelUpdate" class="btn btn-dark text-bold d-none">
                            {{ __('Cancel') }}
                        </a>
                        <button type="submit" id="updateInfo" class="btn btn-custom bg-ucap text-bold d-none">
                            {{ __('Update') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- End col -->
</div>
<!-- End row -->

@endsection


@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $(document).ready(function(){
            $('#editInfo').on('click', function (event) {
                event.preventDefault();
                const url = $(this).attr('href');
                const msg = $(this).attr('confirm-edit');
                if (typeof msg !== 'undefined' && msg !== false) {
                    Swal.fire({
                        title: msg,
                        text: null,
                        icon: 'question',
                        showCancelButton: true,
                        confirmButtonColor: '#f40808',
                        cancelButtonColor: '#363636',
                        cancelButtonText: 'No',
                        confirmButtonText: 'Yes'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            // window.location.href = url;
                            $('#editInfo').addClass('d-none');
                            $('#cancelUpdate').removeClass('d-none');
                            $('#updateInfo').removeClass('d-none');
                            $('.form-control').removeAttr('readonly');
                            $('.form-control').removeAttr('disabled');
                        }
                    })
                } else{
                    window.location.href = url;
                }
            });


            $('#cancelUpdate').on('click', function (event) {
                $('#editInfo').removeClass('d-none');
                $('#cancelUpdate').addClass('d-none');
                $('#updateInfo').addClass('d-none');
                $('.form-control').attr('readonly', true);
                $('.form-control').attr('disabled', true);
            });
        });
    </script>
@endsection
