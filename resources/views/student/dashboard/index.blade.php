@extends('student.layouts.student')

@section('page_title', __('DASHBOARD'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    </style>
@endsection

@section('student_content')

<!-- Start Content Section -->
<div class="education_block_list_layout">
    <div class="row" style="width: 100%; margin: 0;">
        <div class="col-md-4">
            <div class="card mb-2 mt-2">
                <div class="row no-gutters">
                  <div class="col-md-4 align-self-center text-center">
                    <h1 class="p-3 text-muted"><i class="ti-home"></i></h1>
                  </div>
                  <div class="col-md-8 align-self-center text-center">
                    <div class="card-body">
                      <h6 class="card-title text-muted">{{ __('Total Applied') }}</h6>
                      <h2 class="card-text">{{ __('50') }}</h2>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-2 mt-2">
                <div class="row no-gutters">
                  <div class="col-md-4 align-self-center text-center">
                    <h1 class="p-3 text-muted"><i class="ti-home"></i></h1>
                  </div>
                  <div class="col-md-8 align-self-center text-center">
                    <div class="card-body">
                      <h6 class="card-title text-muted">{{ __('Total Applied') }}</h6>
                      <h2 class="card-text">{{ __('50') }}</h2>
                    </div>
                  </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card mb-2 mt-2">
                <div class="row no-gutters">
                  <div class="col-md-4 align-self-center text-center">
                    <h1 class="p-3 text-muted"><i class="ti-home"></i></h1>
                  </div>
                  <div class="col-md-8 align-self-center text-center">
                    <div class="card-body">
                      <h6 class="card-title text-muted">{{ __('Total Applied') }}</h6>
                      <h2 class="card-text">{{ __('50') }}</h2>
                    </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</div>


<div class="dashboard_container">
    <div class="dashboard_container_header">
        <div class="dashboard_fl_1">
            <h4 class="text-dark text-center"><b>{{ __('Recent Short Listed Courses') }}</b></h4>
        </div>
    </div>
    <div class="dashboard_container_body">
        <div class="table-responsive">
            <table class="table">
                <thead class="bg-ucap">
                    <tr>
                        <th scope="col" class="text-center">{{ __('#') }}</th>
                        <th scope="col" class="text-center">{{ __('Course Name') }}</th>
                        <th scope="col" class="text-center">{{ __('University') }}</th>
                        <th scope="col" class="text-center">{{ __('Country') }}</th>
                        <th scope="col" class="text-center">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row">{{ '001' }}</th>
                        <th scope="row">{{ 'course_name_here' }}</th>
                        <th scope="row">{{ 'university_name_here' }}</th>
                        <th scope="row">{{ 'country_name_here' }}</th>
                        <td scope="row" class="text-center">
                            <div class="dash_action_link">
                                <a href="#" class="view">View</a>
                                <a href="#" class="cancel">Cancel</a>
                            </div>	
                        </td>
                    </tr>
                </tbody>
            </table>
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
    </script>
@endsection
