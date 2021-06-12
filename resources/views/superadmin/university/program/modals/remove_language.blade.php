<div class="modal fade" id="programlanguageRemove" tabindex="-1" role="dialog" aria-labelledby="programlanguageRemove-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programlanguageRemove-label">{{ __('Remove Language Test') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.university.faculty.program.language.remove', ['program_id' => decbin($program->id)]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="language" class="col-form-label">{{ __('Select language') }} <sup class="required">*</sup></label>
                        <select class="form-control" id="courselanguageRemoveOption" name="language" required>
                            <option value="" aria-disabled="true">{{ __('Select language (Required)') }}</option>
                            @foreach ($program->languageTests as $language)
                            <option value="{{ $language->id }}">{{ $language->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Remove') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
