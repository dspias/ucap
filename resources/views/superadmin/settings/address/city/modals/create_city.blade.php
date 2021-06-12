<div class="modal fade" id="createNewCity" tabindex="-1" role="dialog" aria-labelledby="createNewCity-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createNewCity-label">{{ __('Create City') }}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('superadmin.settings.address.city.store') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-group">
                        <label for="country" class="col-form-label">{{ __('Select Country') }} <sup class="required">*</sup></label>
                        <select class="select2-single form-control" name="country" id="country" required >
                            <option value="" aria-disabled="true" >{{ __('Select Country *') }}</option>
                            @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="state" class="col-form-label">{{ __('Select Province') }} <sup class="required">*</sup></label>
                        <select class="select2-single form-control" name="state" id="state" required >
                            {{-- <option value="" aria-disabled="true" >{{ __('Select State *') }}</option> --}}
                            {{-- <option value="{{ 'state_id' }}">{{ 'state_name' }}</option> --}}
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="city" class="col-form-label">{{ __('City') }} <sup class="required">*</sup></label>
                        <input type="text" class="form-control" name="city" id="city" placeholder="Enter City Name *" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-custom">{{ __('Assign City') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
