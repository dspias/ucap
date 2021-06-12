<div class="modal fade" id="editFaculty" tabindex="-1" role="dialog" aria-labelledby="editFaculty-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editFaculty-label">
                    {{ $faculty->name }}
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.university.faculty.update', ['faculty_id' => decbin($faculty->id)]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-12">
                            <div class="form-group text-left">
                                <label for="name">{{ __('Faculty Name') }}<sup class="required">*</sup></label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="{{ __('Ex: Department of Mathematics') }}" value="{{ $faculty->name ?? old('name') }}" required>
                            </div>
                        </div>
                        <div class="col-12 text-left">
                            <div class="custom-control custom-checkbox custom-control-inline">
                                <input type="checkbox" id="active" name="status" class="custom-control-input"  @if($faculty->status == true)checked @endif>
                                <label class="custom-control-label" for="active">{{ __('Active This Faculty') }}</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom confirm" confirm="{{ __('Are you sure want to Update this Faculty?') }}">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
