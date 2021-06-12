<div class="modal fade" id="removeRequirement" tabindex="-1" role="dialog" aria-labelledby="removeRequirement-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeRequirement-label">{{ __('Remove Requirement') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.university.faculty.program.requirement.remove') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="requirement" class="col-form-label">{{ __('Select Requirement') }} <sup class="required">*</sup></label>
                        <select class="form-control" id="removeRequirementOption" name="requirement" required>
                            <option value="" aria-disabled="true">{{ __('Select Requirement (Required)') }}</option>
                            @foreach ($program->requirements as $requirement)
                            <option value="{{ $requirement->id }}">{{ $requirement->requirement }}</option>
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
