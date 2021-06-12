<div class="modal fade" id="edit_faq" tabindex="-1" role="dialog" aria-labelledby="edit_faq-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="edit_faq-label">{{ __('Update FAQ') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.settings.ucap.website.faq.update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="key" id="update_key">
                    <div class="form-group">
                        <label>{{ __('Question') }} <span class="required">*</span></label>
                        <input autofocus autocomplete="off" type="text" name="question" id="update_question" class="form-control input-lg @error('question') is-invalid @enderror" value="{{ old('question') }}" placeholder="{{ __('Question') }}" required>
                    </div>
                    <div class="form-group">
                        <label>{{ __('Answer') }}</label>
                        <textarea name="answer" rows="5" id="update_answer" class="form-control @error('answer') is-invalid @enderror" placeholder="{{ __('Type Answer') }}">{{ old('answer') }}</textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
