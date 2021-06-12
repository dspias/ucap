<div class="modal fade" id="removeSession" tabindex="-1" role="dialog" aria-labelledby="removeSession-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeSession-label">{{ __('Remove Session') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.program.session.remove', ['program_id' => decbin($program->id)]) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="session" class="col-form-label">{{ __('Select Session') }} <sup class="required">*</sup></label>
                        <select class="form-control" id="sessionRemoveOption" name="session" required>
                            <option value="" aria-disabled="true">{{ __('Select Session (Required)') }}</option>
                            @foreach ($program->sessions as $session)
                                <option value="{{ $session->id }}">{{ $session->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom confirm" confirm="{{ __('Are you sure want to Reject the Application?') }}">{{ __('Remove') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
