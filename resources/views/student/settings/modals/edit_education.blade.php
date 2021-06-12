<div class="modal fade" id="editQualification" tabindex="-1" role="dialog" aria-labelledby="editQualification-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="max-width: 800px;" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="editQualification-label">{{ __('Your Education') }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('student.settings.education.update') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="education_id" name="id" value="">
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label>{{ __('Level of Education') }}<sup class="text-ucap">*</sup></label>
                            <select class="form-control" name="level" id="edit_level" required style="height: 54px;">
                                <option value="" aria-disabled="true">{{ __('Select Level of Education') }} *</option>
                                <option value="PhD">{{ __('PhD') }}</option>
                                <option value="Master\'s">{{ __('Master\'s') }}</option>
                                <option value="Bachelor's">{{ __('Bachelor/Honours') }}</option>
                                <option value="Diploma">{{ __('Diploma') }}</option>
                                <option value="Certificate">{{ __('Certificate') }}</option>
                                <option value="Grade 12">{{ __('Grade 12') }}</option>
                                <option value="Below Grade 12">{{ __('Below Grade 12') }}</option>
                            </select>
                        </div>

                        <div class="form-group col-md-4">
                            <label>{{ __('Program Name') }}<sup class="text-ucap">*</sup></label>
                            {{-- <select class="form-control" name="field" id="field" required style="height: 54px;">
                                <option value="" aria-disabled="true">{{ __('Program Name') }} *</option>
                                <option value="education_field_name_here">{{ __('education_field_name_here') }}</option>
                            </select> --}}
                            <input type="text" class="form-control" name="field" id="edit_field" placeholder="{{ __('Program Name') }} *" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="major_subject" class="col-form-label pt-0">{{ __('Major Subject') }}</label>
                            <input type="text" class="form-control" name="major_subject" id="edit_major_subject" placeholder="{{ __('Enter Major Subject Name') }}">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="institute" class="col-form-label">{{ __('Institute') }}</label>
                        <input type="text" class="form-control" name="institute" id="edit_institute" placeholder="{{ __('Enter Institute Name') }}">
                    </div>

                    <div class="form-group">
                        <label for="address" class="col-form-label">{{ __('Institute Address') }} <sup class="text-ucap">*</sup></label>
                        <input type="text" class="form-control" name="address" id="edit_address" placeholder="{{ __('Enter Institute Address') }}" required>
                    </div>

                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="start_year" class="col-form-label">{{ __('Started At') }} <sup class="text-ucap">*</sup></label>
                            <input type="number" minlength="4" min="1990" maxlength="4" max="{{ date("Y") }}" class="form-control" name="start_year" id="edit_start_year" placeholder="{{ __('2018') }}" required>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="end_year" class="col-form-label">{{ __('Ends At') }} <sup class="text-ucap">*</sup></label>
                            <input type="number" minlength="4" min="1990" maxlength="4" max="{{ date("Y") }}" class="form-control" name="end_year" id="edit_end_year" placeholder="{{ __('2020') }}" required>

                            <div class="sm-add-ship">
                                <input id="edit_studying" class="checkbox-custom" name="studying" type="checkbox">
                                <label for="edit_studying" class="checkbox-custom-label">{{ __('Studying Yet') }}</label>
                            </div>
                        </div>

                        <div class="form-group col-md-4">
                            <label for="score" class="col-form-label">{{ __('Passing Score') }} <sup class="text-ucap">*</sup></label>
                            <input type="text" class="form-control" name="score" id="edit_score" placeholder="{{ __('4.50') }}" required>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="document" class="col-form-label">{{ __('Document') }}</label>
                            <input type="file" class="form-control" accept="application/pdf" name="document" id="document">
                            <small>{{ __('Please upload your certificate in PDF format') }}</small>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-theme bg-ucap">{{ __('Add Qualification') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
