<div class="modal fade" id="editProgram" tabindex="-1" role="dialog" aria-labelledby="editProgram-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editProgram-label">
                    {{ __('Edit Program') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.program.update', ['program_id' => decbin($program->id)]) }}" method="POST">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group text-left">
                                <label for="level">{{ __('program Level') }}<sup class="required">*</sup></label>

                                <select class="form-control" id="programLevel" name="level" required>
                                    <option value="" aria-disabled="true">{{ __('Select Level (Required)') }}</option>
                                    <option value="{{ 'phd' }}">{{ 'Phd' }}</option>
                                    <option value="{{ 'post graduation' }}">{{ 'Post Graduation' }}</option>
                                    <option value="{{ 'graduation' }}">{{ 'Graduation' }}</option>
                                    <option value="{{ 'diploma' }}">{{ 'Diploma' }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group text-left">
                                <label for="name">{{ __('program Name') }}<sup class="required">*</sup></label>
                                <input type="text" value="{{ $program->name ?? old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Ex: Computer Science and Engineering') }}" required>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="form-group text-left">
                                <label for="short_name">{{ __('Program Short Name') }}<sup class="required">*</sup></label>
                                <input type="text" value="{{ $program->short_name ?? old('short_name') }}" class="form-control @error('short_name') is-invalid @enderror" name="short_name" placeholder="{{ __('Ex: CSE') }}" required>
                            </div>
                        </div>
                        <div class="col-12 text-left">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="status" name="status" class="custom-control-input" @if($program->status == true)checked @endif>
                                <label class="custom-control-label" for="status">{{ __('Active This Program') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom confirm" confirm="{{ __('Are you sure want to Create this Program?') }}">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
