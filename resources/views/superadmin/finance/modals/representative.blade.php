<div class="modal fade" id="updateRepresentativeCommission" tabindex="-1" role="dialog" aria-labelledby="updateRepresentativeCommission-label" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateRepresentativeCommission-label">{{ __('Representative Commission') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.finance.set.commision') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="representative_commission" class="col-form-label">{{ __('Commission') }} <sup class="required">*</sup><sup class="text-muted text-bold">({{ __('In %') }})</sup></label>
                        <input type="number" min="0" max="100" step="0.01" class="form-control" name="representative_commission" id="representative_commission" value="{{ $commission['representative'] }}" placeholder="Ex: 10" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Update Commission') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
