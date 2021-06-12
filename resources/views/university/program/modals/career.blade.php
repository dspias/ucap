<div class="modal fade" id="careerOpportunities" tabindex="-1" role="dialog" aria-labelledby="careerOpportunities-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="careerOpportunities-label">{{ __('Career Opportunity') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.program.update', ['program_id' => decbin($program->id)]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="career_path" class="col-form-label">{{ __('Career Opportunity') }} <sup class="required">*</sup></label>
                        <textarea name="career_path" id="careerOpportunitiesNote" class="form-control" rows="4" placeholder="Write Career Opportunity. (Required)" required minlength="20" maxlength="5000">{{ $program-> career_path ?? old('career_path') }}</textarea>
                        <small class="text-danger"><span class="text-bold">[[{{ __('Note: Minimum 20 Character and Maximum 5000 Character') }}.]]</span></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom confirm" confirm="{{ __('Are you sure want to Reject the Application?') }}">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
