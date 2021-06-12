@extends('layouts.student.app')

@section('page_title', __('Comparison Basket'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    .badge.badge-dark.program-level.text-capitalize {
        padding: 5px 10px;
        font-size: 12px;
        font-weight: bold;
        border: 1px solid #647b9c;
        background: transparent;
        color: #647b9c;
        cursor: pointer;
        border-radius: 0px;
    }
    </style>
@endsection



@section('content')

<!-- Start Content Section -->
<!-- ========================== Featured Category Section =============================== -->
<section class="pt-5">
    <div class="container">

        <div class="row justify-content-center">
            <div class="col-lg-5 col-md-6 col-sm-12">
                <div class="sec-heading center">
                    <h2>
                        <span class="theme-cl">{{ __('Comparison') }}</span>
                        {{ __('Basket') }}
                    </h2>
                    <p>{{ __('Compare your selected programs') }}</p>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <table class="table table-bordered table-responsive">
                    <thead class="thead">
                        <tr>
                            <th class="text-left" style="width: 40%;">{{ __('Program Name') }}</th>
                            <th class="text-left" style="width: 30%;">{{ __('Language Requirements') }}</th>
                            <th class="text-left" style="width: 15%;">{{ __('Tution Fees') }}</th>
                            <th class="text-left" style="width: 15%;">{{ __('Applications Fee') }}</th>
                        </tr>
                    </thead>
                    @php
                        $compare = Compare::get();
                        $programs = (array)$compare['programs'];
                        $compared = count($programs);
                    @endphp
                    <tbody class="tbody">
                        @foreach ($programs as $list => $temp)
                        @php
                            $program = \App\Models\Program::find($temp->id);
                            if(is_null($program))continue;
                        @endphp
                        <tr>
                            <td class="text-left text-bold" style="width: 40%;">
                                <a href="{{ route('guest.program.show', ['program_id' => decbin($program->id), 'program_title' => get_name($program->name)]) }}" class="text-ucap text-bold" style="font-size: 20px;">{{ $program->name }}</a>
                                <br>
                                <p class="badge badge-dark program-level text-capitalize">{{ $program->level }}</p>
                                <br>
                                <a href="{{ route('guest.university.show', ['id' => decbin(optional(optional($program->faculty)->university)->id), 'name' => get_name(optional(optional($program->faculty)->university)->name)]) }}" class="text-muted text-bold">{{ optional(optional($program->faculty)->university)->name }}</a>
                            </td>
                            <td class="text-left text-bold" style="width: 30%;">
                                <ul class="edu_list right">
                                    @php
                                        $languageTests = $program->languageTests()->withPivot(['band', 'individual', 'details'])->get();
                                    @endphp
                                    @foreach ($languageTests as $nn =>  $lang)
                                    @if($nn != 0)<li><hr class="break"></li>@endif
                                    <li>
                                        <i class="ti-check-box text-ucap"></i>
                                        {{ $lang->name }}:
                                        <strong>{{ __('Min: ') }}{{ $lang->pivot->band }}</strong>
                                        @if($lang->pivot->individual == true)
                                        <ul class="ml-5">
                                            <li class="p-1 pr-3">
                                                {{-- <i class="ti-arrow-right text-ucap"></i> --}}
                                                <strong class="text-muted text-light">{{ $lang->pivot->details }}</strong>
                                            </li>
                                        </ul>
                                        @endif
                                    </li>
                                    @endforeach
                                </ul>
                            </td>
                            <td class="text-left text-bold" style="width: 15%;">{{ ucap_get('currency_sign') }}{{ $program->yearly_fee }}</td>
                            <td class="text-left text-bold" style="width: 15%;">{{ ucap_get('currency_sign') }}{{ $program->application_fee }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="col-12 float-right pull-right text-right">
                <a href="{{ route('student.compare.clear') }}" class="btn btn-modern text-bold float-right text-right confirm" confirm="{{ __('Are you sure want to clear your comparison list?') }}">
                    {{ __('Clear Comparison List') }}
                    <span><i class="ti-trash"></i></span>
                </a>
            </div>
        </div>

    </div>
</section>
<!-- ========================== Featured Category Section =============================== -->
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
    </script>
@endsection
