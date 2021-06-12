<div class="modal fade" id="programOverview" tabindex="-1" role="dialog" aria-labelledby="programOverview-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programOverview-label">{{ __('Program Overview') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.program.update', ['program_id' => decbin($program->id)]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="program_overview" class="col-form-label">{{ __('Program Overview') }} <sup class="required">*</sup></label>
                        <textarea name="program_overview" id="programOverviewNote" class="form-control" rows="4" placeholder="Write program Overview. (Required)" required minlength="20" maxlength="5000">{{ $program->program_overview ?? old('program_overview') }}</textarea>
                        <small class="text-danger"><span class="text-bold">[[{{ __('Note: Minimum 20 Character and Maximum 5000 Character') }}.]]</span></small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
