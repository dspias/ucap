<div class="tab-pane fade" id="faqButton" role="tabpanel" aria-labelledby="faqID">
    <form action="{{ route('superadmin.settings.ucap.website.faq.store') }}" method="post">
        @csrf
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="question">{{ __('Question') }}<sup class="required">*</sup></label>
                    <input type="text" class="form-control" value="{{ old('question') }}" name="question" placeholder="{{ __('Ex: Why UCAP? *') }}" required>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label for="answer">{{ __('Answer') }}<sup class="required">*</sup></label>
                    <textarea class="form-control max-length" rows="3" min="0" maxlength="200" name="answer" placeholder="{{ __('Short Answer *') }}" required>{{ old('answer') }}</textarea>
                </div>
            </div>

            <div class="col-12">
                <button type="submit" class="btn btn-custom float-right mb-2">{{ __('Add New FAQ') }}</button>
            </div>
        </div>
    </form>

    <div class="row m-t-30">
        <div class="col-12 text-center">
            <h4 class="text-bold">{{ __('All FAQ') }}</h4>
        </div>
        <hr>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th class="text-center">{{ __('Sl.') }}</th>
                            <th>{{ __('Question') }}</th>
                            <th>{{ __('Answer') }}</th>
                            <th>{{ __('Added Date') }}</th>
                            <th>{{ __('Updated Date') }}</th>
                            <th class="text-center">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach ((array)$faqs as $sl => $faq)
                        <tr>
                            <td class="text-center"><b>{{ $sl+1 }}</b></td>
                            <td>{{ $faq['question'] }}</td>
                            <td>{{ $faq['answer'] }}</td>
                            <td>{{ get_date($faq['created_at'], 'd M, Y') }}</td>
                            <td>{{ get_date($faq['updated_at'], 'd M, Y') }}</td>
                            <td class="text-center">
                                @php
                                    $en_faq = json_encode($faq);
                                @endphp
                                <a class="btn btn-custom btn-sm"  href="javascript:void(0);" data-keyboard="false" data-toggle="modal" data-target="#edit_faq" data-key="{{ $sl }}" data-todo="{{ $en_faq }}"><i class="ti-pencil"></i></a>
                                <a class="btn btn-custom bg-ucap btn-sm confirm" confirm="Are You sure want to delete this Question?" href="{{ route('superadmin.settings.ucap.website.faq.delete', ['key' => $sl]) }}"><i class="ti-trash"></i></a>
                            </td>
                            @include('superadmin.settings.ucap.website.modals.edit_faq')
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
