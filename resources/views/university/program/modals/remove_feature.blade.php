<div class="modal fade" id="programFeatureRemove" tabindex="-1" role="dialog" aria-labelledby="programFeatureRemove-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programFeatureRemove-label">{{ __('Remove Feature') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.program.feature.remove') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="feature" class="col-form-label">{{ __('Select Feature') }} <sup class="required">*</sup></label>
                        <select class="form-control" id="courseFeatureRemoveOption" name="feature" required>
                            <option value="" aria-disabled="true">{{ __('Select Feature (Required)') }}</option>
                            @foreach ($program->features as $feature)
                            <option value="{{ $feature->id }}">{{ $feature->feature }}</option>
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
