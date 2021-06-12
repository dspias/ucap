@extends('superadmin.settings.ucap.index')



@section('setting_content')
    <form action="{{ route('superadmin.settings.ucap.contact.store') }}" method="post">
        @csrf
        <div class="card-header border bottom">
            <h5 class="mb-0">{{ __('Contact Settings') }}</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    <input type="text" class="form-control mb-3" name="mobile" id="mobile" placeholder="Mobile Number">
                </div>
                <div class="col-md-4">
                    <input type="tel" class="form-control mb-3" name="phone" id="phone" placeholder="Phone Number">
                </div>
                <div class="col-md-4">
                    <input type="email" class="form-control mb-3" name="email" id="email" placeholder="Email Address">
                </div>
                <div class="col-md-4">
                    <input type="url" class="form-control mb-3" name="facebook" id="facebook" placeholder="Facebook URL">
                </div>
                <div class="col-md-4">
                    <input type="url" class="form-control mb-3" name="instagram" id="instagram" placeholder="Instagram URL">
                </div>
                <div class="col-md-4">
                    <input type="url" class="form-control mb-3" name="linkedin" id="linkedin" placeholder="Linkedin URL">
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Update Contact Info') }}</button>
        </div>
    </form>
@endsection
