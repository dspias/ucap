@extends('layouts.student.app')

@section('page_title', __('FAQ\'s'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .accordion .card{
        box-shadow: none !important;
    }
    .accordion .card-header{
        cursor: pointer;
    }
    .accordion .card-body{
        border: 1px solid #f40808;
    }
    </style>
@endsection



@section('content')
<!-- Start Content Section -->
<!-- ============================ Page Title Start================================== -->
<section class="page-title">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                
                <div class="breadcrumbs-wrap">
                    <h1 class="breadcrumb-title">{{ __('FAQ\'s') }}</h1>
                </div>
                
            </div>
        </div>
    </div>
</section>
<!-- ============================ Page Title End ================================== -->	

<!-- =================================== FAQS =================================== -->
<section class="pt-0">
    <div class="container">        
        <div class="row">
            <div class="col-12">
                <div class="accordion" id="generalac">
                    <div class="card">
                        <div class="card-header bg-ucap" id="headingOne" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          <h4 class="mb-0 text-white">{{ __('faq_question_here') }}</h4>
                        </div>
    
                        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#generalac">
                          <div class="card-body">
                            <p class="ac-para">
                                {{ __('faq_question_answer_here') }}
                            </p>
                          </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header bg-ucap" id="headingTwo" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                            <h4 class="mb-0 text-white">{{ __('faq_question_here') }}</h4>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#generalac">
                          <div class="card-body">
                            <p class="ac-para">
                                {{ __('faq_question_answer_here') }}
                            </p>
                          </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- ====================================== FAQS =================================== -->
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
