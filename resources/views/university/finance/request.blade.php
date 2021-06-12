@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Payment Request'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('Payment Request') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Finance') }}</li>
    <li class="breadcrumb-item">{{ __('Payments') }}</li>
    <li class="breadcrumb-item active">{{ __('Payment Request') }}</li>
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
    <div class="col-md-12 col-lg-10 col-xl-10">
        <div class="card m-b-30">
            <div class="card-header">
                <h4 class="card-title text-bold float-left">{{ __('Request for Payment') }}</h4>
                <h4 class="card-title text-bold text-muted float-right">{{ __('Fund: ') }} <span class="text-ucap">$221.80</span></h4>
            </div>
            <form action="#" method="post">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="amount">{{ __('Withdraw Amount') }}<sup class="required">*</sup> <sup class="text-muted">[In USD ($)]</sup></label>
                                <input type="number" min="0" max="{{ 'available_fund' }}" step="0.01" class="form-control" value="{{ old('amount') }}" name="amount" placeholder="Ex: 500" required>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="account_name">{{ __('Account Name') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" value="{{ old('account_name') }}" name="account_name" placeholder="Ex: Mr. John Doe" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="bank_name">{{ __('Bank Name') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" value="{{ old('bank_name') }}" name="bank_name" placeholder="Ex: Bank of Canada" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="account_number">{{ __('Account Number') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control" value="{{ old('account_number') }}" name="account_number" placeholder="Ex: 12234455687688" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                {{-- @if (not saved before) --}}
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="save_info" id="save_info">
                                        <label class="custom-control-label text-capitalize" for="save_info">{{ __('Save Account Information for Further Transactions.') }}</label>
                                    </div>
                                {{-- @else --}}
                                    {{-- <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" name="update_info" id="update_info">
                                        <label class="custom-control-label text-capitalize" for="update_info">{{ __('Update Account Information for Further Transactions.') }}</label>
                                    </div> --}}
                                {{-- @endif --}}
                            </div>
                        </div>
                    </div>

                    <div class="text-right">
                        <button type="submit" class="btn btn-custom bg-ucap text-bold">
                            {{ __('Request for Payment') }}
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
    </script>
@endsection
