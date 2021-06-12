<div class="modal fade" id="addNewOffer" tabindex="-1" role="dialog" aria-labelledby="addNewOffer-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addNewOffer-label">{{ __('Create New Offer') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="card">
                <form action="#" method="post">
                    @csrf
                    <div class="card-header border bottom">
                        <h5 class="mb-0">{{ __('Application Settings') }}</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="discount">{{ __('Discount') }} <sup class="text-ucap">*</sup></label>
                                    <div class="input-group mb-3" id="discount">
                                        <input type="number" min="0.00" step="0.01" name="discount" class="form-control" placeholder="Ex: 5.00" required>
                                        <div class="input-group-append d-none" id="inAmount">
                                            <span class="input-group-text text-bold text-ucap">{{ ucap_get('currency_sign') }}</span>
                                        </div>
                                        <div class="input-group-append" id="inPercent">
                                            <span class="input-group-text text-bold text-ucap">{{ '%' }}</span>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="amount" name="discount_type" value="amount" class="custom-control-input discount_type">
                                        <label class="custom-control-label text-capitalize" for="amount">{{ __('In Amount (') .ucap_get('currency_sign').')' }}</label>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <input type="radio" id="percent" name="discount_type" value="percent" class="custom-control-input discount_type" checked>
                                        <label class="custom-control-label text-capitalize" for="percent">{{ __('In Percent (%)') }}</label>
                                    </div>
                                </div>
                            </div>
            
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="total_app">{{ __('On Apply of') }} <sup class="text-ucap">*</sup></label>
                                    <div class="input-group mb-3" id="total_app">
                                        <input type="number" min="0" max="10" step="1" name="total_app" class="form-control" placeholder="Ex: 3" required>
                                        <div class="input-group-append">
                                            <span class="input-group-text text-dark text-bold">{{ __('Application\'s at a Time') }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Create Offer') }}</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
