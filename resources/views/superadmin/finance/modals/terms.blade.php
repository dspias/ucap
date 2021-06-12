<div class="modal fade" id="addNewTermsAndCondition" tabindex="-1" role="dialog" aria-labelledby="addNewTermsAndCondition-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewTermsAndCondition-label">{{ __('Add Payment Terms & Condition') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.finance.termcondition.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="terms" class="col-form-label">{{ __('Terms & Condition') }} <sup class="required">*</sup></label>
                        <input type="text" minlength="0" maxlength="100" class="form-control" name="termcondition" id="terms" placeholder="Terms & Condition" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Add New') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
