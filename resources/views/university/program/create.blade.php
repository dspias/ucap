@extends('layouts.university.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Create Program'))

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
    <b class="text-uppercase">{{ __('Create Program') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Programs') }}</li>
    <li class="breadcrumb-item active">{{ __('Create Program') }}</li>
@endsection


@section('action')
    <button class="btn btn-custom" onClick="window.location.reload();">
        <i class="feather icon-refresh-cw mr-1"></i>
        {{ __('Refresh') }}
    </button>
@endsection



@section('content')

<!-- Start row -->
<div class="row">
    <!-- Start col -->
    <div class="col-md-12">
        <div class="card m-b-30">
            <form action="{{ route('university.program.store') }}" method="post">
                @csrf
                {{-- <div class="card-header border bottom">
                    <h5 class="mb-0">{{ __('Create New Student') }}</h5>
                </div> --}}
                <div class="card-body">
                    <div class="row">

                        <div class="col-12">
                            <div class="form-group text-left">
                                <label for="faculty">{{ __('Faculty') }}<sup class="required">*</sup></label>

                                <select class="form-control" id="programfaculty" name="faculty_id" required>
                                    <option value="" aria-disabled="true">{{ __('Select Faculty (Required)') }}</option>
                                    @foreach($faculties as $facultly)
                                    <option value="{{ $facultly->id }}">{{ $facultly->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group text-left">
                                <label for="level">{{ __('Program Level') }}<sup class="required">*</sup></label>

                                <select class="form-control" id="programLevel" name="level" required>
                                    <option value="" aria-disabled="true">{{ __('Select Level (Required)') }}</option>
                                    <option value="{{ 'phd' }}">{{ 'Phd' }}</option>
                                    <option value="{{ 'post graduation' }}">{{ 'Post Graduation' }}</option>
                                    <option value="{{ 'graduation' }}">{{ 'Graduation' }}</option>
                                    <option value="{{ 'diploma' }}">{{ 'Diploma' }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="name">{{ __('Program Name') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Ex: Computer Science & Engineering') }}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="form-group">
                                <label for="short_name">{{ __('Program Short name') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control @error('short_name') is-invalid @enderror" name="short_name" placeholder="{{ __('Ex: Computer Science & Engineering') }}" required>
                                @error('short_name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Create Program') }}</button>
                    <button type="reset" class="btn btn-danger float-right mb-2 mr-1" onclick="return confirm('Are You Sure Want To Reset?');">{{ __('Reset') }}</button>
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

