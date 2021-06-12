<div class="modal fade docs-action" id="languageAction" tabindex="-1" role="dialog" aria-labelledby="docs-action" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header d-block">
          <h5 class="modal-title text-center" id="educationName">{{ __('doc_type_name') }}</h5>
        </div>
        <div class="modal-body">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table-responsive">
                            <table class="table table-responsive-sm table-bordered">
                                <tbody>
                                    {{-- <tr>
                                        <th scope="row" class="text-left">{{ __('Document\'s') }}</th>
                                        <td scope="row" class="text-left">
                                            <span class="text-bold" id="fileName">{{ __('file_name_here') }}</span>
                                        </td>
                                    </tr> --}}

                                    <tr>
                                        <th scope="row" class="text-left">{{ __('Total Size') }}</th>
                                        <td scope="row" class="text-left">
                                            <span class="text-bold" id="fileSize">{{ __('file_size_here') }}</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <th scope="row" class="text-left">{{ __('Upload Date') }}</th>
                                        <td scope="row" class="text-left">
                                            <span class="text-bold" id="fileUploadDate">{{ __('file_upload_date_here') }}</span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="modal-footer">
            <a href="#" confirm="{{ __('Are You Sure Want To Delete This Document?') }}" class="btn btn-link text-ucap text-bold confirm"  id="document_destroy">
                <i class="ti-trash mr-1 text-bold"></i>
                {{ __('Delete') }}
            </a>
            <a href="#" class="btn btn-dark bg-ucap" id="document_download">
                <i class="ti-import mr-1 text-bold text-white"></i>
                {{ __('Download') }}
            </a>
        </div>
      </div>
    </div>
  </div>
