<div class="modal fade" id="updateState" tabindex="-1" role="dialog" aria-labelledby="updateState-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateState-label">{{ __('Update Province') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.settings.address.state.update') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <input type="hidden" name="state_id" value="" id="state_id">
                    <div class="form-group">
                        <label for="country" class="col-form-label">{{ __('Select Country') }} <sup class="required">*</sup></label>
                        <select class="select2-single form-control" id="update_country" name="country" id="country" required >
                            <option value="" aria-disabled="true" >{{ __('Select Country') }}</option>
                            @foreach ($countries as $country)
                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="state" class="col-form-label">{{ __('Province') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" id="update_state" name="state" id="state" placeholder="Enter Province Name *" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Update Province') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
