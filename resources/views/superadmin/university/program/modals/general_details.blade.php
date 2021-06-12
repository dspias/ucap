<div class="modal fade" id="programDetails" tabindex="-1" role="dialog" aria-labelledby="programDetails-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programDetails-label">{{ __('Program General Details') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.university.faculty.program.update', ['program_id' => decbin($program->id)]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="program_duration" class="col-form-label">{{ __('Program Duration') }} <sup class="required">*</sup></label>
                                <input type="number" min="0" step="1" name="program_duration" class="form-control" value="{{ $program->program_duration ?? old('program_duration') }}" placeholder="{{ __('Ex: 24 Months') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="program_semester" class="col-form-label">{{ __('Total Semester') }} <sup class="required">*</sup></label>
                                <input type="number" min="0" step="1" name="program_semester" class="form-control" value="{{ $program->program_semester ?? old('program_semester') }}" placeholder="{{ __('Ex: 4') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="semester_duration" class="col-form-label">{{ __('Semester Duration') }} <sup class="required">*</sup></label>
                                <input type="number" min="0" step="1" name="semester_duration" class="form-control" value="{{ $program->semester_duration ?? old('semester_duration') }}" placeholder="{{ __('Ex: 3 months') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="internship" class="col-form-label">{{ __('Internship') }} <sup class="required">*</sup></label>
                                <select class="select2-single form-control" name="internship" value="{{ old('internship') }}" id="internship" required >
                                    <option value="" aria-disabled="true" >{{ __('Select Internship *') }}</option>
                                    <option value="Paid">{{ __('Paid') }}</option>
                                    <option value="Unpaid">{{ __('Unpaid') }}</option>
                                    <option value="No">{{ __('No') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="scholarship" class="col-form-label">{{ __('Scholarship') }} <sup class="required">*</sup></label>
                                <select class="select2-single form-control" name="scholarship" value="{{ old('scholarship') }}" id="scholarship" required >
                                    <option value="" aria-disabled="true" >{{ __('Offer Scholarship? *') }}</option>
                                    <option value="Yes">{{ __('Yes') }}</option>
                                    <option value="No">{{ __('No') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="attendance_type" class="col-form-label">{{ __('Attendance Type') }} <sup class="required">*</sup></label>
                                <select class="select2-single form-control" name="attendance_type" value="{{ old('attendance_type') }}" id="attendance_type" required >
                                    <option value="" aria-disabled="true" >{{ __('Attendance Type *') }}</option>
                                    <option value="On Campus">{{ __('On Campus') }}</option>
                                    <option value="Online">{{ __('Online') }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="total_credit" class="col-form-label">{{ __('Total Credit') }} <sup class="required">*</sup></label>
                                <input type="number" min="0" step="0.5" name="total_credit" class="form-control" value="{{ $program->total_credit ?? old('total_credit') }}" placeholder="{{ __('Ex: 36') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="website" class="col-form-label">{{ __('Website Link') }} <sup class="required">*</sup></label>
                                <input type="url" name="website" class="form-control" placeholder="url" aria-describedby="basic-addon2" value="{{ $program->website }}" required/>
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
