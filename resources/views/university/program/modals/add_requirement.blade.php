<div class="modal fade" id="addRequirement" tabindex="-1" role="dialog" aria-labelledby="addRequirement-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addRequirement-label">{{ __('Program Requirement') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.program.requirement.add', ['program_id' => decbin($program->id)]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="requirement" class="col-form-label">{{ __('Program Requirement') }} <sup class="required">*</sup></label>
                                <input type="text" name="requirement" class="form-control" minlength="10" maxlength="150" value="{{ old('requirement') }}" placeholder="{{ __('Program Requirement (Required)') }}" required>
                                <small class="text-danger"><span class="text-bold">[[{{ __('Note: Minimum 10 Character and Maximum 150 Character') }}.]]</span></small>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Add Requirement') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
