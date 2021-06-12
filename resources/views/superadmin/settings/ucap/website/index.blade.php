@extends('superadmin.settings.ucap.index')

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .nav-pills .nav-link.active {
        color: #ffffff;
        background-color: var(--color2);
    }

    .cover-upload {
        position: relative;
        max-width: 100%;
        margin-bottom: 30px;
    }
    .cover-upload .avatar-edit {
        position: absolute;
        right: 10px;
        z-index: 1;
        top: 10px;
    }
    .cover-upload .avatar-edit input {
        display: none;
    }
    .cover-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 0px;
        background: #ffffff;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .cover-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }
    .cover-upload .avatar-edit input + label:after {
        content: "\f040";
        font-family: "FontAwesome";
        color: #757575;
        position: absolute;
        top: 7px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }
    .cover-upload .avatar-preview {
        width: 100%;
        height: 240px;
        position: relative;
        border-radius: 0px;
        border: 2px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .cover-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 0px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }



    .about-upload {
        position: relative;
        max-width: 100%;
        margin-bottom: 30px;
    }
    .about-upload .avatar-edit {
        position: absolute;
        right: 10px;
        z-index: 1;
        top: 10px;
    }
    .about-upload .avatar-edit input {
        display: none;
    }
    .about-upload .avatar-edit input + label {
        display: inline-block;
        width: 34px;
        height: 34px;
        margin-bottom: 0;
        border-radius: 0px;
        background: #ffffff;
        border: 1px solid transparent;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.12);
        cursor: pointer;
        font-weight: normal;
        transition: all 0.2s ease-in-out;
    }
    .about-upload .avatar-edit input + label:hover {
        background: #f1f1f1;
        border-color: #d6d6d6;
    }
    .about-upload .avatar-edit input + label:after {
        content: "\f040";
        font-family: "FontAwesome";
        color: #757575;
        position: absolute;
        top: 7px;
        left: 0;
        right: 0;
        text-align: center;
        margin: auto;
    }
    .about-upload .avatar-preview {
        width: 100%;
        height: 240px;
        position: relative;
        border-radius: 0px;
        border: 2px solid #f8f8f8;
        box-shadow: 0px 2px 4px 0px rgba(0, 0, 0, 0.1);
    }
    .about-upload .avatar-preview > div {
        width: 100%;
        height: 100%;
        border-radius: 0px;
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
    }
    </style>
@endsection

@section('setting_content')
     <!-- Start col -->
     <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <ul class="nav nav-pills justify-content-center custom-tab-button mb-3" id="pills-tab-button" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link text-bold active" id="homepageID" data-toggle="pill" href="#homepageButton" role="tab" aria-controls="homepageButton" aria-selected="true">
                            <span class="tab-btn-icon">
                                <i class="feather icon-home"></i>
                            </span>
                            {{ __('Homepage') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-bold" id="contactID" data-toggle="pill" href="#contactButton" role="tab" aria-controls="contactButton" aria-selected="false">
                            <span class="tab-btn-icon">
                                <i class="feather icon-phone"></i>
                            </span>
                            {{ __('Contact') }}
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-bold" id="faqID" data-toggle="pill" href="#faqButton" role="tab" aria-controls="faqButton" aria-selected="false">
                            <span class="tab-btn-icon">
                                <i class="feather icon-message-circle"></i>
                            </span>
                            {{ __('FAQ') }}
                        </a>
                    </li>
                </ul>
                <div class="tab-content" id="pills-tabContent-button">
                    @include('superadmin.settings.ucap.website.partials.homepage')

                    @include('superadmin.settings.ucap.website.partials.contact')

                    @include('superadmin.settings.ucap.website.partials.faq')
                </div>
            </div>
        </div>
    </div>
    <!-- End col -->
@endsection

@section('script_links')
    {{--  External Javascript Links --}}
    <!-- MaxLength js -->
    <script src="{{ asset('assets/plugins/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
    <script src="{{ asset('assets/js/custom/custom-form-maxlength.js') }}"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        /*
        --------------------------------------
            : Custom - Form MaxLength js :
        --------------------------------------
        */
        "use strict";
        $(document).ready(function() {
            /* -- Form - MaxLength -- */
            $('.max-length').maxlength({
                alwaysShow: false,
                threshold: 10,
                warningClass: "badge badge-warning",
                limitReachedClass: "badge badge-danger",
                separator: ' char out of ',
                preText: 'You have used ',
                postText: ' chars.',
                validate: true
            });
        });
    </script>

    <script>
        function readCoverURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#coverPreview').css('background-image', 'url('+e.target.result +')');
                    $('#coverPreview').hide();
                    $('#coverPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#coverUpload").change(function() {
            readCoverURL(this);
        });


        function readAboutURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#aboutPreview').css('background-image', 'url('+e.target.result +')');
                    $('#aboutPreview').hide();
                    $('#aboutPreview').fadeIn(650);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#aboutUpload").change(function() {
            readAboutURL(this);
        });
    </script>


    <script>
        $('#edit_faq').on('show.bs.modal', function (e) {
            // do something...
            var button = $(e.relatedTarget); // Button that triggered the modal
            var data = button.data('todo');
            var key = button.data('key');

            var modal = $(this);
            modal.find('#update_question').val(data.question);
            modal.find('#update_answer').val(data.answer);
            modal.find('#update_key').val(key);
        });
    </script>
@endsection
