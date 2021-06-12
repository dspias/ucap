<div class="modal fade" id="programCurriculumEdit" tabindex="-1" role="dialog" aria-labelledby="programCurriculumEdit-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programCurriculumEdit-label">{{ __('Edit Semester & Subject') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.program.curriculum.update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="curriculum_id" value="curriculum_id" id="edit_curriculum_id">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="semester_no" class="col-form-label">{{ __('Semester No') }} <sup class="required">*</sup></label>
                                <input type="number" name="semester_no" id="edit_semester_no" class="form-control" min="1" value="{{ old('semester_no') }}" placeholder="{{ __('1') }}" required>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="form-group">
                                <label for="title" class="col-form-label">{{ __('Semester Title') }} <sup class="required">*</sup></label>
                                <input type="text" name="title" id="edit_semester_title" class="form-control" minlength="10" maxlength="100" value="{{ old('title') }}" placeholder="{{ __('Semister Title (Required)') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <div class="card border">
                                <div class="card-header" style="padding: 5px 10px;">
                                    <h4 class="float-left">{{ __('Assigned Subjects') }}</h4>
                                    <a href="javascript:void(0)" class="btn btn-custom btn-sm float-right edit_add_subject">{{ __('Add Subject') }}</a>
                                </div>
                                <div class="card-body">
                                    <div class="row edit_subjects">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>

