<div class="modal fade upload-docs" id="uploadDocs" tabindex="-1" role="dialog" aria-labelledby="uploadDocs" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <h5 class="modal-title text-center"  id="educationName">{{ __('doc_type_name') }}</h5>
        </div>

        <form action="{{ route('student.documents.upload_education') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-body">
                <div class="container">
                    <div class="row">
                        <input type="hidden" id="upload_education_id" name="id" value="">
                        <div class="col-12">
                            <div class="form-group">
                                <label>{{ __('Upload your document') }}<sup class="text-ucap">*</sup></label>
                                <input type="file" accept="application/pdf" name="document" class="form-control @error('document') is-invalid @enderror" placeholder="{{ __('Upload your document *') }}" required>

                                @error('document')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-dark bg-ucap">
                    <i class="ti-export mr-1 text-bold text-white"></i>
                    {{ __('Upload Document') }}
                </button>
            </div>
        </form>

      </div>
    </div>
</div>
