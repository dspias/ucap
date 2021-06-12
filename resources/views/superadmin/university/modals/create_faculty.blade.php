<div class="modal fade" id="createFaculty" tabindex="-1" role="dialog" aria-labelledby="createFaculty-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createFaculty-label">
                    {{ __('Create New Faculty ') }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.university.faculty.store', ['uni_id' => $university->id]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group text-left">
                                <label for="name">{{ __('Faculty Name') }}<sup class="required">*</sup></label>
                                <input type="text" value="{{ old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Ex: Department of Mathematics') }}" required>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-12 text-left">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="status" name="status" class="custom-control-input" checked>
                                <label class="custom-control-label" for="status">{{ __('Active This Faculty') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom confirm" confirm="{{ __('Are you sure want to Create this Faculty?') }}">{{ __('Create Now') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
