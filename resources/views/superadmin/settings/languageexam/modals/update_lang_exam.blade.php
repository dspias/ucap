<div class="modal fade" id="updateExam" tabindex="-1" role="dialog" aria-labelledby="updateExam-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateExam-label">{{ __('Update Language Exam') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.settings.languageexam.update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" value="" name="exam_id" id="exam_id" required>
                    <div class="form-group">
                        <label for="name" class="col-form-label">{{ __('Language Test Name') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="IELTS" required>
                    </div>
                    <div class="form-group">
                        <label for="score" class="col-form-label">{{ __('Language Test Base Score') }} <sup class="required">*</sup></label>
                        <input  type="number" step=".01" class="form-control" name="score" id="score" placeholder="9.00" required>
                    </div>
                    <div class="form-group">
                        <label for="desrciption" class="col-form-label">{{ __('Language Test Desrciption') }} <sup class="required">*</sup></label>
                        <textarea class="form-control" name="desrciption" id="desrciption" cols="30" rows="3" required placeholder="Aa...">{{ old('desrciption') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Update Language Test') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
