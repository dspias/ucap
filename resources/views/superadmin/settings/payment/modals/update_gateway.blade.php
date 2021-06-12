<div class="modal fade" id="updateGateway" tabindex="-1" role="dialog" aria-labelledby="updateGateway-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateGateway-label">{{ __('Update Gateway') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.settings.payment.update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" value="" name="gateway_id" id="gateway_id" required>
                    <div class="form-group">
                        <label for="name" class="col-form-label">{{ __('Gateway Name') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" name="name" id="update_name" placeholder="Stripe" required>
                    </div>
                    <div class="form-group">
                        <label for="currency" class="col-form-label">{{ __('Gateway Currency') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" name="currency" id="update_currency" placeholder="usd" required>
                    </div>
                    <div class="form-group">
                        <label for="key" class="col-form-label">{{ __('Gateway Key') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" name="key" id="update_key" placeholder="key_xxxxxxxxxxxxxxxxxxx" required>
                    </div>
                    <div class="form-group">
                        <label for="secret" class="col-form-label">{{ __('Gateway Secret') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" name="secret" id="update_secret" placeholder="secret_xxxxxxxxxxxxxxxxxxx" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Update Gateway') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
