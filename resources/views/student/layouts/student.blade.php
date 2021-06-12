@extends('layouts.student.app')

@section('content')

<section>
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                @include('student.layouts.partials.sidenav')
            </div>

            <div class="col-md-9">
                <!-- Start Content Section -->
                @yield('student_content')
                <!-- End Content Section -->
            </div>
        </div>
    </div>
</section>

@endsection
