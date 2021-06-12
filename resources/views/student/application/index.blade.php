@extends('student.layouts.student')

@section('page_title', __('My Applications'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    *[data-href] {
        cursor: pointer !important;
    }
    </style>
@endsection

@section('student_content')

<!-- Start Content Section -->
<div class="education_block_list_layout d-block">
    <div class="row">
        <div class="col-12 text-center">
            <h4 class="mb-0">{{ __('My Applications') }}</h4>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead class="bg-ucap">
                        <tr>
                            <th scope="col" class="text-center text-bold">{{ __('#') }}</th>
                            <th scope="col" class="text-center text-bold">{{ __('Application ID') }}</th>
                            <th scope="col" class="text-center text-bold">{{ __('Applied Date') }}</th>
                            <th scope="col" class="text-center text-bold">{{ __('Status') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($applications as $sl => $application)
                        <tr data-href="{{ route('student.application.show', ['id' => decbin($application->id), 'application_id' => $application->aid]) }}">
                            <th scope="row" class="text-center text-bold">{{ $sl+1 }}</th>
                            <th scope="row" class="text-center text-bold">{{ $application->aid }}</th>
                            <th scope="row" class="text-center text-bold">{{ get_date($application->created_at, 'd M, Y') }}</th>
                            <th scope="row" class="text-center text-bold">{!! application_status($application->status) !!}</th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
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
        // Custom Script Here
        $(document).ready(function() {
            // Table Row Link
            $('*[data-href]').click(function(){
                window.location = $(this).data('href');
                return false;
            });
        });
    </script>
@endsection
