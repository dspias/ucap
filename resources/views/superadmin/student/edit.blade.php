@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Students'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
@endsection


@section('page_name')
    <b class="text-uppercase">{{ __('student_name_here') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">
        <a href="{{ route('superadmin.student.index') }}" class="text-dark text-bold">{{ __('Students') }}</a>
    </li>
    <li class="breadcrumb-item active">{{ __('Edit Student') }}</li>
@endsection


@section('action')
    <button class="btn btn-custom" onClick="window.location.reload();">
        <i class="feather icon-refresh-cw mr-1"></i>
        {{ __('Refresh') }}
    </button>
@endsection



@section('content')

<!-- Start row -->

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
