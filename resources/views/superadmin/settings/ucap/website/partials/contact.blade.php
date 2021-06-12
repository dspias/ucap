<div class="tab-pane fade" id="contactButton" role="tabpanel" aria-labelledby="contactID">
    <form action="{{ route('superadmin.settings.ucap.website.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="contact_email">{{ __('Contact Email Receive At') }}<sup class="required">*</sup></label>
                    <input type="email" class="form-control" value="{{ ucap_get('contact_email') ?? old('contact_email') }}" name="contact_email" placeholder="{{ __('Ex: contact@email.com *') }}" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="support_email">{{ __('Support Email') }}<sup class="required">*</sup></label>
                    <div class="input-group">
                        <input type="email" class="form-control" value="{{ ucap_get('support_email_one') ?? old('support_email_one') }}" name="support_email_one" placeholder="{{ __('Ex: support1@email.com *') }}" required>
                        <input type="email" class="form-control" value="{{ ucap_get('support_email_two') ?? old('support_email_two') }}" name="support_email_two" placeholder="{{ __('Ex: support2@email.com') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="support_contact">{{ __('Support Contact No') }}<sup class="required">*</sup></label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ ucap_get('support_contact_one') ?? old('support_contact_one') }}" name="support_contact_one" placeholder="{{ __('Ex: +91 235 548 7548 *') }}" required>
                        <input type="text" class="form-control" value="{{ ucap_get('support_contact_two') ?? old('support_contact_two') }}" name="support_contact_two" placeholder="{{ __('Ex: (41) 123 521 458') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="whatsapp_no">{{ __('Whatsapp No') }}<sup class="required">*</sup></label>
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ ucap_get('whatsapp_no_one') ?? old('whatsapp_no_one') }}" name="whatsapp_no_one" placeholder="{{ __('Ex: +91 235 548 7548 *') }}" required>
                        <input type="text" class="form-control" value="{{ ucap_get('whatsapp_no_two') ?? old('whatsapp_no_two') }}" name="whatsapp_no_two" placeholder="{{ __('Ex: (41) 123 521 458') }}">
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="ucap_address">{{ __('UCAP Address') }}<sup class="required">*</sup></label>
                    <input type="text" class="form-control" value="{{ ucap_get('ucap_address') ?? old('ucap_address') }}" name="ucap_address" placeholder="{{ __('Write Address here') }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="facebook">{{ __('Facebook') }}<sup class="required">*</sup></label>
                    <input type="url" class="form-control" value="{{ ucap_get('facebook') ?? old('facebook') }}" name="facebook" placeholder="{{ __('Ex: https://www.facebook.com/ucap *') }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="instgram">{{ __('Instagram') }}<sup class="required">*</sup></label>
                    <input type="url" class="form-control" value="{{ ucap_get('instgram') ?? old('instgram') }}" name="instgram" placeholder="{{ __('Ex: https://www.instgram.com/ucap *') }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="linkedin">{{ __('Linkedin') }}<sup class="required">*</sup></label>
                    <input type="url" class="form-control" value="{{ ucap_get('linkedin') ?? old('linkedin') }}" name="linkedin" placeholder="{{ __('Ex: https://www.linkedin.com/ucap *') }}" required>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Update Contact') }}</button>
            </div>
        </div>
    </form>
</div>
