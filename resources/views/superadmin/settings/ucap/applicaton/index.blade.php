@extends('superadmin.settings.ucap.index')



@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .input-group-append .input-group-text {
        border: 1px solid #d4d8de;
        background: #ffffff;
        color: #dddddd;
        border-left: 0px solid transparent;
        padding: 0.275rem .75rem;
    }
    </style>
@endsection

@section('setting_content')
    <form action="{{ route('superadmin.settings.ucap.application.store') }}" method="post">
        @csrf
        <div class="card-header border bottom">
            <h5 class="mb-0">{{ __('Application Settings') }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="cart_limit">{{ __('Maximum Apply at a Time') }}</label>
                        <input type="number" class="form-control" min="0" max="10" step="1" name="cart_limit" id="cart_limit" placeholder="Ex: 3" value="{{ ucap_get('cart_limit') ?? old('cart_limit') }}">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tax">{{ __('Tax') }} <sup class="text-ucap text-bold text-capitalize">in Percent(%)</sup></label>
                        <input type="number" class="form-control" min="0.01" max="100.00" step="0.01" name="tax" id="tax" placeholder="Ex: 0.05" value="{{ ucap_get('tax') ??  old('tax') }}">
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Update Application') }}</button>
        </div>
    </form>
@endsection

@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>

    </script>
@endsection
