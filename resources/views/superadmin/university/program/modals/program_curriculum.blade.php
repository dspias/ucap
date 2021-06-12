<div class="modal fade" id="programCurriculum" tabindex="-1" role="dialog" aria-labelledby="programCurriculum-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programCurriculum-label">{{ __('Add New Semester & Subject') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.university.faculty.program.curriculum.add', ['program_id' => decbin($program->id)]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="semester_no" class="col-form-label">{{ __('Semester No') }} <sup class="required">*</sup></label>
                                <input type="number" name="semester_no" id="programCurriculumSemesterNo" class="form-control" min="1" value="{{ old('semester_no') }}" placeholder="{{ __('Ex: 01') }}" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="title" class="col-form-label">{{ __('Semester Title') }} <sup class="required">*</sup></label>
                                <input type="text" name="title" id="programCurriculumSemester" class="form-control" minlength="10" maxlength="100" value="{{ old('title') }}" placeholder="{{ __('Ex: Fall Semester') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card border">
                                <div class="card-header" style="padding: 5px 10px;">
                                    <h4 class="float-left">{{ __('Assign Subjects') }}</h4>
                                    <a href="javascript:void(0)" class="btn btn-custom btn-sm float-right add_subject">{{ __('Add Subject') }}</a>
                                </div>
                                <div class="card-body">
                                    <div class="row subjects">
                                        <div class="col-md-12 form-group">
                                            <div class="input-group">
                                                <input type="text" class="form-control program-subject-name" name="subjects[0][name]" placeholder="Subject *" required>
                                                <input type="text" class="form-control program-subject-code" name="subjects[0][code]" placeholder="Code *" required>
                                                <input type="number" min="0" max="5" step="0.1" class="form-control program-subject-credit" name="subjects[0][credit]" placeholder="Credit *" required>
                                                <div class="input-group-append program-subject-delete">
                                                    <button class="btn btn-cutom bg-ucap"  onclick="return deleteSubject(this);" data-toggle="tooltip" data-title="{{ __('Delete') }}" type="button">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom confirm" confirm="{{ __('Are you sure want to Reject the Application?') }}">{{ __('Assign Now') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
