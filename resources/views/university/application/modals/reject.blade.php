<div class="modal fade" id="rejectApplication" tabindex="-1" role="dialog" aria-labelledby="rejectApplication-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="rejectApplication-label">{{ __('Rejection Reason') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.application.reject_with_reason', ['program_id' => decbin($data->id)]) }}" method="POST" id="rejectForm">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="note" class="text-left">{{ __('Why Do You Want To Reject The Application?') }} <sup class="required">*</sup></label>
                        <textarea name="note" id="note" class="form-control" rows="4" placeholder="Write Rejection Note. (Required)" required minlength="20" maxlength="200"></textarea>
                        <small class="text-danger"><span class="text-bold">[[{{ __('Note: Minimum 20 Character and Maximum 200 Character') }}.]]</span></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom confirm" confirm="{{ __('Are you sure want to Reject the Application?') }}">{{ __('Reject Application') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
