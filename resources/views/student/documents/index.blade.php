@extends('student.layouts.student')

@section('page_title', __('My Documents'))

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
<div class="education_block_list_layout d-block">
    <div class="row">
        <div class="col-12 text-center">
            <h4>{{ __('My Documents') }}</h4>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-responsive-sm table-bordered">
                    <tbody>
                        <tr>
                            <th scope="row" class="text-center">{{ __('Passport Size Photo') }}</th>
                            <td scope="row" class="text-center">
                                @if (!is_null(has_media($student, 'avatar')))
                                    <a href="javascript:void(0);" data-student="{{ $student }}" data-type="{{ 'avatar' }}" data-toggle="modal" data-target="#fileAction" class="btn btn-link">
                                        <i class="ti-import mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Download') }}</span>
                                    </a>
                                @else
                                    <a href="javascript:void(0);" data-type="{{ 'avatar' }}"  data-toggle="modal" data-target="#uploadFile" class="btn btn-link">
                                        <i class="ti-export mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Upload') }}</span>
                                    </a>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th scope="row" class="text-center">{{ __('NID / Birth Certificate') }}</th>
                            <td scope="row" class="text-center">
                                @if (!is_null(has_media($student, 'nid_birth')))
                                    <a href="javascript:void(0);" data-student="{{ $student }}" data-type="{{ 'nid_birth' }}" data-toggle="modal" data-target="#fileAction" class="btn btn-link">
                                        <i class="ti-import mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Download') }}</span>
                                    </a>
                                @else
                                    <a href="javascript:void(0);" data-type="{{ 'nid_birth' }}"  data-toggle="modal" data-target="#uploadFile" class="btn btn-link">
                                        <i class="ti-export mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Upload') }}</span>
                                    </a>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th scope="row" class="text-center">{{ __('Passport') }}</th>
                            <td scope="row" class="text-center">
                                @if (!is_null(has_media($student, 'passport')))
                                    <a href="javascript:void(0);" data-student="{{ $student }}" data-type="{{ 'passport' }}" data-toggle="modal" data-target="#fileAction" class="btn btn-link">
                                        <i class="ti-import mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Download') }}</span>
                                    </a>
                                @else
                                    <a href="javascript:void(0);" data-type="{{ 'passport' }}"  data-toggle="modal" data-target="#uploadFile" class="btn btn-link">
                                        <i class="ti-export mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Upload') }}</span>
                                    </a>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th scope="row" class="text-center">{{ __('Language Test') }}</th>
                            <td scope="row" class="text-center">
                                @if (!is_null(has_media($student, 'language_certificate')))
                                    <a href="javascript:void(0);" data-student="{{ $student }}" data-type="{{ 'language_certificate' }}" data-toggle="modal" data-target="#fileAction" class="btn btn-link">
                                        <i class="ti-import mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Download') }}</span>
                                    </a>
                                @else
                                    <a href="javascript:void(0);" data-type="{{ 'language_certificate' }}"  data-toggle="modal" data-target="#uploadFile" class="btn btn-link">
                                        <i class="ti-export mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Upload') }}</span>
                                    </a>
                                @endif
                            </td>
                        </tr>

                        <tr>
                            <th scope="row" class="text-center">{{ __('Declaration/Signature') }}</th>
                            <td scope="row" class="text-center">
                                @if (!is_null(has_media($student, 'signature')))
                                    <a href="javascript:void(0);" data-student="{{ $student }}" data-type="{{ 'signature' }}" data-toggle="modal" data-target="#fileAction" class="btn btn-link">
                                        <i class="ti-import mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Download') }}</span>
                                    </a>
                                @else
                                    <a href="javascript:void(0);" data-type="{{ 'signature' }}"  data-toggle="modal" data-target="#uploadFile" class="btn btn-link">
                                        <i class="ti-export mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Upload') }}</span>
                                    </a>
                                @endif
                            </td>
                        </tr>

                    </tbody>
                </table>

                <table class="table table-responsive-sm table-bordered">
                    <tbody>
                        <tr>
                            <th class="text-center text-bold" colspan="2">{{ __('Educational Documents') }}</th>
                        </tr>
                        @foreach ($educations as $item => $education)
                        <tr>
                            <th scope="row" class="text-center">{{ $education->level }}</th>
                            <td scope="row" class="text-center">
                                @if (!is_null(has_media($education, 'document')))
                                    <a href="javascript:void(0);" data-todo="{{ $education }}" data-toggle="modal" data-target="#docsAction" class="btn btn-link">
                                        <span class="text-bold">{{ __($education->field) }}</span>
                                    </a>
                                @else
                                    <a href="javascript:void(0);" data-id="{{ $education->id }}"  data-todo="{{ $education }}" data-toggle="modal" data-target="#uploadDocs" class="btn btn-link">
                                        <i class="ti-export mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Upload') }}</span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-responsive-sm table-bordered">
                    <tbody>
                        <tr>
                            <th class="text-center text-bold" colspan="2">{{ __('Language Documents') }}</th>
                        </tr>
                        @foreach ($languages as $item => $language)
                        <tr>
                            <th scope="row" class="text-center">{{ optional($language->language)->name }}</th>
                            <td scope="row" class="text-center">
                                @if (!is_null(has_media($language, 'certificate')))
                                    <a href="javascript:void(0);" data-todo="{{ $language }}" data-toggle="modal" data-target="#languageAction" class="btn btn-link">
                                        <i class="ti-import mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Download') }}</span>
                                    </a>
                                @else
                                    <a href="javascript:void(0);" data-id="{{ $language->id }}"  data-todo="{{ $language }}" data-toggle="modal" data-target="#languageUpload" class="btn btn-link">
                                        <i class="ti-export mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Upload') }}</span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <table class="table table-responsive-sm table-bordered">
                    <tbody>
                        <tr>
                            <th class="text-center text-bold" colspan="2">
                                {{ __('Aditional Documents') }}

                                <a href="javascript:void(0);"  data-toggle="modal" data-target="#aditionalUpload" class="btn btn-link">
                                    <i class="ti-export mr-1 text-bold text-ucap"></i>
                                    <span class="text-bold">{{ __('Upload') }}</span>
                                </a>
                            </th>
                        </tr>
                        @foreach ($aditionals as $item => $aditional)
                        <tr>
                            <th scope="row" class="text-center">{{ $aditional->name }}</th>
                            <td scope="row" class="text-center">
                                @if (!is_null(has_media($aditional, 'document')))
                                    <a href="javascript:void(0);" data-todo="{{ $aditional }}" data-toggle="modal" data-target="#aditionalAction" class="btn btn-link">
                                        <i class="ti-import mr-1 text-bold text-ucap"></i>
                                        <span class="text-bold">{{ __('Download') }}</span>
                                    </a>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@include('student.documents.modals.upload')
@include('student.documents.modals.action')

{{-- doc upload --}}
@include('student.documents.modals.doc_upload')
@include('student.documents.modals.doc_action')

{{-- doc upload --}}
@include('student.documents.modals.languageAction')
@include('student.documents.modals.languageUpload')


@include('student.documents.modals.aditionalAction')
@include('student.documents.modals.aditionalUpload')
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $('#docsAction').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var data = button.data('todo');
            var modal = $(this);

            var download = "{{ url('student/documents/download/education') }}/"+data.id;
            var destroy = "{{ url('student/documents/destroy/education') }}/"+data.id;

            modal.find('#educationName').html(data.level);
            modal.find('#fileName').html(data.field);
            modal.find('#fileSize').html(bytesToMegaBytes(data.media[0].size));
            var date = new Date(data.media[0].created_at);
            modal.find('#fileUploadDate').html(date.toDateString());
            modal.find('#document_destroy').attr('href', destroy);
            modal.find('#document_download').attr('href', download);

        });

        $('#uploadDocs').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var data = button.data('todo');
            var modal = $(this);
            modal.find('#educationName').html(data.level);
            modal.find('#upload_education_id').val(id);
        });
        $('#languageAction').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var data = button.data('todo');
            var modal = $(this);

            var download = "{{ url('student/documents/language/download') }}/"+data.id;
            var destroy = "{{ url('student/documents/language/destroy') }}/"+data.id;

            modal.find('#educationName').html(data.language.name);
            // modal.find('#fileName').html(data.field);
            modal.find('#fileSize').html(bytesToMegaBytes(data.media[0].size));
            var date = new Date(data.media[0].created_at);
            modal.find('#fileUploadDate').html(date.toDateString());
            modal.find('#document_destroy').attr('href', destroy);
            modal.find('#document_download').attr('href', download);

        });

        $('#languageUpload').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var id = button.data('id');
            var data = button.data('todo');
            var modal = $(this);
            modal.find('#educationName').html(data.language.name);
            modal.find('#upload_education_id').val(id);
        });


        $('#aditionalAction').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var data = button.data('todo');
            var modal = $(this);

            var download = "{{ url('student/documents/aditional/download') }}/"+data.id;
            var destroy = "{{ url('student/documents/aditional/destroy') }}/"+data.id;

            modal.find('#educationName').html(data.name);
            modal.find('#fileSize').html(bytesToMegaBytes(data.media[0].size));
            var date = new Date(data.media[0].created_at);
            modal.find('#fileUploadDate').html(date.toDateString());
            modal.find('#document_destroy').attr('href', destroy);
            modal.find('#document_download').attr('href', download);

        });


        function bytesToMegaBytes(bytes) {
            var num = bytes / (1024*1024);
            return num.toFixed(2) + 'MB';
        }
    </script>

    <script>
        // Custom Script Here
        $('#fileAction').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var student = button.data('student');
            var type = button.data('type');
            var modal = $(this);

            var download = "{{ url('student/documents/download') }}/"+type;
            var destroy = "{{ url('student/documents/destroy') }}/"+type;
            modal.find('#educationName').html(type);
            modal.find('#fileName').html(student.media[0].name);
            modal.find('#fileSize').html(bytesToMegaBytes(student.media[0].size));
            var date = new Date(student.media[0].created_at);
            modal.find('#fileUploadDate').html(date.toDateString());
            modal.find('#document_destroy').attr('href', destroy);
            modal.find('#document_download').attr('href', download);

        });

        $('#uploadFile').on('shown.bs.modal', function (event) {
            var button = $(event.relatedTarget);
            var type = button.data('type');
            var modal = $(this);

            if(type == 'avatar'){
                modal.find('#file').attr('accept', 'image/jpeg');
            }

            var upload = "{{ url('student/documents/upload') }}/"+type;
            modal.find('#upload_form').attr('action', upload);

            modal.find('#file_upload_name').html(type);
        });
        function bytesToMegaBytes(bytes) {
            var num = bytes / (1024*1024);
            return num.toFixed(2) + 'MB';
        }
    </script>
@endsection
