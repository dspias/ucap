@extends('superadmin.settings.ucap.index')



@section('setting_content')
<form action="{{ route('superadmin.settings.ucap.email.store') }}" method="post">
    @csrf
    <div class="card-header border bottom">
        <h5 class="mb-0">{{ __('Email Settings') }}</h5>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control mb-3" name="email" id="email" placeholder="Email">
            </div>
        </div>
    </div>
    <div class="card-footer">
        <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Update') }}</button>
    </div>
</form>
@endsection
