<div class="tab-pane fade show active" id="homepageButton" role="tabpanel" aria-labelledby="homepageID">
    <form action="{{ route('superadmin.settings.ucap.website.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="cover-upload">
                    <div class="avatar-edit">
                        <input type='file' name="cover_photo" id="coverUpload" accept=".png, .jpg, .jpeg" />
                        <label for="coverUpload"></label>
                    </div>
                    @if(!is_null($url = ucap_get('cover_photo')))
                    <div class="avatar-preview">
                        <div id="coverPreview" style="background-image: url({{ show_image($url) }});">
                        </div>
                    </div>
                    @else
                    <div class="avatar-preview">
                        <div id="coverPreview" style="background-image: url(https://via.placeholder.com/1920x650?text=Cover+Photo+1920x650);">
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="heading">{{ __('Cover Heading') }}<sup class="required">*</sup></label>
                    <input type="text" class="form-control max-length" maxlength="50" value="{{ ucap_get('cover_heading') ?? old('cover_heading') }}" name="cover_heading" placeholder="{{ __('Cover Heading *') }}" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="moto_ucap">{{ __('Short Moto') }}<sup class="required">*</sup></label>
                    <input type="text" class="form-control max-length" maxlength="200" value="{{ ucap_get('moto_ucap') ?? old('moto_ucap') }}" name="moto_ucap" placeholder="{{ __('Short Moto *') }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="max_university">{{ __('Maximum University Display') }}<sup class="required">*</sup></label>
                    <input type="number" class="form-control max-length" min="0" max="9" value="{{ ucap_get('max_university') ?? old('max_university') }}" name="max_university" placeholder="{{ __('Ex: 6') }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="max_program">{{ __('Maximum Program Display') }}<sup class="required">*</sup></label>
                    <input type="number" class="form-control max-length" min="0" max="9" value="{{ ucap_get('max_program') ?? old('max_program') }}" name="max_program" placeholder="{{ __('Ex: 6') }}" required>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="about_ucap">{{ __('About UCAP') }}<sup class="required">*</sup></label>
                    <textarea class="form-control max-length" rows="9" min="0" maxlength="5000" name="about_ucap" placeholder="{{ __('Short Description of UCAP') }}" required>{{ ucap_get('about_ucap') ?? old('about_ucap') }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="about-upload">
                    <div class="avatar-edit">
                        <input type='file' name="about_photo" id="aboutUpload" accept=".png, .jpg, .jpeg" />
                        <label for="aboutUpload"></label>
                    </div>
                    @if(!is_null($url = ucap_get('about_photo')))
                    <div class="avatar-preview">
                        <div id="aboutPreview" style="background-image: url({{ show_image($url) }});">
                        </div>
                    </div>
                    @else
                    <div class="avatar-preview">
                        <div id="aboutPreview" style="background-image: url(https://via.placeholder.com/550x490?text=About+Photo+550x490);">
                        </div>
                    </div>
                    @endif
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Update Homepage') }}</button>
            </div>
        </div>
    </form>
</div>
