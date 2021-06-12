<div class="modal fade" id="programFeature" tabindex="-1" role="dialog" aria-labelledby="programFeature-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programFeature-label">{{ __('Program Feature') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.program.feature.add', ['program_id' => decbin($program->id)]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="feature" class="col-form-label">{{ __('Program Feature') }} <sup class="required">*</sup></label>
                        <input type="text" name="feature" id="courseFeatureNote" class="form-control" minlength="10" maxlength="100" value="{{ old('feature') }}" placeholder="{{ __('Program Feature (Required)') }}" required>
                        <small class="text-danger"><span class="text-bold">[[{{ __('Note: Minimum 10 Character and Maximum 100 Character') }}.]]</span></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Add Feature') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
