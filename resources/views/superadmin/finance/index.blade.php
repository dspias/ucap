@extends('layouts.superadmin.app')

@section('meta_tags')
    {{--  External META's  --}}

@endsection

@section('page_title', __('Status'))

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
    <b class="text-uppercase">{{ __('Status') }}</b>
@endsection


@section('breadcrumb')
    <li class="breadcrumb-item">{{ __('Finance') }}</li>
    <li class="breadcrumb-item active">{{ __('Status') }}</li>
@endsection


@section('action')
    <h4 class="text-muted">
        {{ __('Available Fund') }}: <br>
        <span class="text-ucap text-bold font-28">
            ({{ Str::upper($balance['currency']) }}) {{ show_price($balance['amount']) }}
        </span>
    </h4>
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
