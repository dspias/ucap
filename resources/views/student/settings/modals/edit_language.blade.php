<div class="modal fade" id="editLanguage" tabindex="-1" role="dialog" aria-labelledby="editLanguage-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px;" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="editLanguage-label">{{ __('Language Certification') }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('student.settings.language.update') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" id="language_id" name="id" value="">
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label>{{ __('Language Certificate') }}<sup class="text-ucap">*</sup></label>
                            <select class="form-control" name="language_id" id="language_id" required style="height: 54px;" required>
                                <option value="" aria-disabled="true">{{ __('Select Certificate') }}</option>
                                @foreach ($langTests as $language)
                                    <option value="{{ $language->id }}">{{ $language->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="band" class="col-form-label pt-0">{{ __('Total Score') }}<sup class="text-ucap">*</sup></label>
                            <input type="number" step=".1" class="form-control" name="band" id="band" placeholder="{{ __('Enter Score') }}" required>
                        </div>

                        <div class="sm-add-ship col-md-12">
                            <input id="edit_individual" class="checkbox-custom" name="individual" type="checkbox">
                            <label for="edit_individual" class="checkbox-custom-label">{{ __('Type Detailed Test score') }}</label>
                        </div>

                        <div class="form-group col-md-12 mt-2 d-none" id="edit_individualInputs">
                            <div class="input-group">
                                <textarea class="form-control individual-input" name="details" placeholder="Details" id="details"></textarea>
                            </div>
                        </div>

                        <div class="form-group col-md-12">
                            <label for="certificate" class="col-form-label">{{ __('Documents') }}</label>
                            <input type="file" class="form-control" accept="application/pdf" name="certificate" id="certificate">
                            <small>{{ __('Please upload your certificate in PDF format') }}</small>
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-theme bg-ucap">{{ __('Update Certification') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
