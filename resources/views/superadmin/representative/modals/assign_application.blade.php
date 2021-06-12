<div class="modal fade" id="assignNewApplication" tabindex="-1" role="dialog" aria-labelledby="assignNewApplication-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="assignNewApplication-label">{{ __('Assign Application For '. 'representative_name_here') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="#" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="application" class="col-form-label">{{ __('Select Aplication') }} <sup class="required">*</sup></label>
                        <select class="select2-single form-control" name="application" id="application" required >
                            <option value="" aria-disabled="true" >{{ __('Select Aplication *') }}</option>
                            <option value="{{ 'application_id' }}">{{ 'application_app_id' }}</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="note" class="col-form-label">{{ __('Note') }}</label>
                        <textarea cols="3" minlength="0" maxlength="200" class="form-control" name="note" id="note" placeholder="Type any note"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Assign Task') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
