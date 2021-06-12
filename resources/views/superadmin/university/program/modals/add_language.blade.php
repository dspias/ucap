<div class="modal fade" id="programLangugage" tabindex="-1" role="dialog" aria-labelledby="programLangugage-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programLangugage-label">{{ __('Program Language Test') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.university.faculty.program.language.add', ['program_id' => decbin($program->id)]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="language" class="col-form-label">{{ __('Select Language Test') }} <sup class="required">*</sup></label>
                        <select class="form-control" id="courseLanguageRemoveOption" name="language" required>
                            <option value="" aria-disabled="true">{{ __('Select Language') }}</option>
                            @foreach ($langTests as $language)
                                <option value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="band" class="col-form-label">{{ __('Minimum Score') }} <sup class="required">*</sup></label>
                        <input type="number" min="0.00" step="0.1" name="band" class="form-control" value="{{ old('band') }}" placeholder="{{ __('Ex: 8.5') }}" required>
                    </div>
                    <div class="custom-control custom-checkbox custom-control-inline text-capitalize">
                        <input type="checkbox" id="individualCheckbox" name="individual" class="custom-control-input text-capitalize">
                        <label class="custom-control-label text-capitalize" for="individualCheckbox">{{ __('Individual Score?') }}</label>
                    </div>
                    <div class="form-group mt-2 d-none" id="individualInputs">
                        <div class="input-group">
                            <textarea class="form-control individual-input" name="details" placeholder="Individual Details"></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Add language') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
