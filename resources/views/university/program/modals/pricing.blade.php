<div class="modal fade" id="programPricing" tabindex="-1" role="dialog" aria-labelledby="programPricing-label" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="programPricing-label">{{ __('Program Fees') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('university.program.update', ['program_id' => decbin($program->id)]) }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="yearly_fee" class="col-form-label">{{ __('Yearly Fee') }} <sup class="required">*</sup> <sup class="text-muted text-bold">{{ ucap_get('currency_sign').'('. ucap_get('currency_name'). ')' }}</sup></label>
                                <input type="number" min="0.00" step=".1" name="yearly_fee" class="form-control" value="{{ $program->yearly_fee ?? old('yearly_fee') }}" placeholder="{{ __('Ex: 199') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="application_fee" class="col-form-label">{{ __('Application Fee') }} <sup class="required">*</sup> <sup class="text-muted text-bold">{{ ucap_get('currency_sign').'('. ucap_get('currency_name'). ')' }}</sup></label>
                                <input type="number" min="0.00" step=".1" name="application_fee" class="form-control" value="{{ $program->application_fee ?? old('application_fee') }}" placeholder="{{ __('Ex: 199') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="credit_fee" class="col-form-label">{{ __('Credit Fee') }} <sup class="required">*</sup> <sup class="text-muted text-bold">{{ ucap_get('currency_sign').'('. ucap_get('currency_name'). ')' }}</sup></label>
                                <input type="number" min="0.00" step=".1" name="credit_fee" class="form-control" value="{{ $program->credit_fee ?? old('credit_fee') }}" placeholder="{{ __('Ex: 2000') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="lab_fee" class="col-form-label">{{ __('Lab Fee') }} <sup class="required">*</sup> <sup class="text-muted text-bold">{{ ucap_get('currency_sign').'('. ucap_get('currency_name'). ')' }}</sup></label>
                                <input type="number" min="0.00" step=".1" name="lab_fee" class="form-control" value="{{ $program->lab_fee ?? old('lab_fee') }}" placeholder="{{ __('Ex: 100') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="retake_fee" class="col-form-label">{{ __('Retake Fee') }} <sup class="required">*</sup> <sup class="text-muted text-bold">{{ ucap_get('currency_sign').'('. ucap_get('currency_name'). ')' }}</sup></label>
                                <input type="number" min="0.00" step=".1" name="retake_fee" class="form-control" value="{{ $program->retake_fee ?? old('retake_fee') }}" placeholder="{{ __('Ex: 50') }}" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="extra_fee" class="col-form-label">{{ __('Extra Fee') }} <sup class="required">*</sup> <sup class="text-muted text-bold">{{ ucap_get('currency_sign').'('. ucap_get('currency_name'). ')' }}</sup></label>
                                <input type="number" min="0.00" step=".1" name="extra_fee" class="form-control" value="{{ $program->extra_fee ?? old('extra_fee') }}" placeholder="{{ __('Ex: 0') }}" required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Update') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
