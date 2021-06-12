<div class="modal fade" id="assignRepresentative" tabindex="-1" role="dialog" aria-labelledby="assignRepresentative-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignRepresentative-label">{{ __('Assign Representative') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.application.assign_rep') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="appitem" id="appitem" value="">
                    <div class="form-group">
                        <label for="representative" class="col-form-label">{{ __('Select Representative') }} <sup class="required">*</sup></label>
                        <select class="form-control" id="assignRepresentativeOption" name="representative" required>
                            <option value="" aria-disabled="true">{{ __('Select Representative') }}</option>
                            <option value="{{ 'representative_text_here' }}">{{ 'representative_text_here' }}</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom confirm" confirm="{{ __('Are you sure want to Reject the Application?') }}">{{ __('Assign Now') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
