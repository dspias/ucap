<div class="modal fade" id="createNewGateway" tabindex="-1" role="dialog" aria-labelledby="createNewGateway-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNewGateway-label">{{ __('Create Gateway') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.settings.payment.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="name" class="col-form-label">{{ __('Gateway Name') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="Stripe" required>
                    </div>
                    <div class="form-group">
                        <label for="currency" class="col-form-label">{{ __('Gateway Currency') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" name="currency" id="currency" placeholder="usd" required>
                    </div>
                    <div class="form-group">
                        <label for="key" class="col-form-label">{{ __('Gateway Key') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" name="key" id="key" placeholder="key_xxxxxxxxxxxxxxxxxxx" required>
                    </div>
                    <div class="form-group">
                        <label for="secret" class="col-form-label">{{ __('Gateway Secret') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" name="secret" id="secret" placeholder="secret_xxxxxxxxxxxxxxxxxxx" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Assign Gateway') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
