<div class="modal fade" id="addNewSession" tabindex="-1" role="dialog" aria-labelledby="addNewSession-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewSession-label">{{ __('Add New Session') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.program.session.add', ['program_id' => decbin($program->id)]) }}" method="POST">
            @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="name" class="col-form-label">{{ __('Session Name') }} <sup class="required">*</sup></label>
                                <input type="text" name="name" class="form-control" value="{{ old('name') }}" placeholder="{{ __('Ex: Summer') }}" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="session_start" class="col-form-label">{{ __('Session Starts At') }} <sup class="required">*</sup></label>
                                <input type="text" name="session_start" class="autoclose-datepicker datepicker-here form-control" placeholder="yyyy-mm-dd" aria-describedby="basic-addon2" required/>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="application_deadline" class="col-form-label">{{ __('Applicaiton Deadline') }} <sup class="required">*</sup></label>
                                <input type="text" name="application_deadline" class="autoclose-datepicker datepicker-here form-control" placeholder="yyyy-mm-dd" aria-describedby="basic-addon2" required/>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Add') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
