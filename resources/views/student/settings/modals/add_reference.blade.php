<div class="modal fade" id="addReference" tabindex="-1" role="dialog" aria-labelledby="addReference-label" aria-hidden="true">
    <div class="modal-dialog" style="max-width: 600px;" role="document">
        <div class="modal-content">
            <div class="modal-header bg-dark">
                <h5 class="modal-title text-white" id="addReference-label">{{ __('Add Reference') }}</h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('student.settings.reference.store') }}" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="first_name" class="col-form-label pt-0">{{ __('First Name') }}<sup class="text-ucap">*</sup></label>
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="{{ __('Ex: Mr. John') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="last_name" class="col-form-label pt-0">{{ __('Last Name') }}<sup class="text-ucap">*</sup></label>
                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="{{ __('Ex: Due') }}" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="professional_designation" class="col-form-label pt-0">{{ __('Professional Designation') }}<sup class="text-ucap">*</sup></label>
                            <input type="text" class="form-control" name="professional_designation" id="professional_designation" placeholder="{{ __('Ex: Assistant Professor') }}" required>
                        </div>
                        <div class="form-group col-md-12">
                            <label for="company_institution" class="col-form-label pt-0">{{ __('Company/Institution') }}<sup class="text-ucap">*</sup></label>
                            <input type="text" class="form-control" name="company_institution" id="company_institution" placeholder="{{ __('Ex: Sylhet, Bangladesh') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="col-form-label pt-0">{{ __('Email') }}<sup class="text-ucap">*</sup></label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="{{ __('Ex: jhon@mail.com') }}" required>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="phone" class="col-form-label pt-0">{{ __('Phone Number') }}</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="{{ __('Ex: 01712345678') }}">
                        </div>
                    </div>
                </div>


                <div class="modal-footer">
                    <button type="submit" class="btn btn-theme bg-ucap">{{ __('Add Reference') }}</button>
                </div>
            </form>
        </div>
    </div>
</div>
