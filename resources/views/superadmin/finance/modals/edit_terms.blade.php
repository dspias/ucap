<div class="modal fade" id="editTermsAndCondition" tabindex="-1" role="dialog" aria-labelledby="editTermsAndCondition-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editTermsAndCondition-label">{{ __('Edit Payment Terms & Condition') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.finance.termcondition.update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="key" id="update_key">
                    <div class="form-group">
                        <label for="terms" class="col-form-label">{{ __('Terms & Condition') }} <sup class="required">*</sup></label>
                        <input type="text" minlength="0" maxlength="100" class="form-control" name="termcondition" id="update_termcondition" placeholder="Terms & Condition" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
