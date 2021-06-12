@extends('student.layouts.student')

@section('page_title', __('My Applications | Details'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    *[data-href] {
        cursor: pointer !important;
    }
    </style>
@endsection

@section('student_content')

<!-- Start Content Section -->
<div class="education_block_list_layout d-block">
    <div class="row">
        <div class="col-12 text-center">
            <h4 class="mb-0 text-ucap">{{ $application->aid }}</h4>
        </div>
    </div>
    <hr>

    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-borderless">
                    <thead class="bg-ucap">
                        <tr>
                            <th scope="col" class="text-center text-bold">{{ __('#') }}</th>
                            <th scope="col" class="text-center text-bold">{{ __('Program') }}</th>
                            <th scope="col" class="text-center text-bold">{{ __('Session') }}</th>
                            <th scope="col" class="text-center text-bold">{{ __('University') }}</th>
                            <th scope="col" class="text-center text-bold">{{ __('Application Fees') }}</th>
                            <th scope="col" class="text-center text-bold">{{ __('Status') }}</th>
                            <th scope="col" class="text-center text-bold">{{ __('Action') }}</th>
                        </tr>
                    </thead>
                    @php
                        $total_amount = 0.00;
                        $tax = $application->tax;
                        $discount = $application->discount;
                    @endphp
                    <tbody>
                        @foreach($application->programs as $sl => $data)
                        @php
                            $program = $data->program;
                            $total_amount += $data->discount_fee;
                        @endphp
                        <tr>
                            <th scope="row" class="text-center text-bold">{{ $sl+1 }}</th>
                            <th scope="row" class="text-center text-bold">{{ optional($program)->short_name }}</th>
                            <th scope="row" class="text-center text-bold">{{ optional($data->session)->name }}</th>
                            <th scope="row" class="text-center text-bold">{{ optional(optional(optional($program)->faculty)->university)->name }}</th>
                            <th scope="row" class="text-center text-bold">{{ ucap_get('currency_sign').$program->application_fee }}</th>
                            <th scope="row" class="text-center text-bold">
                                {!! application_status($data->status) !!}
                            </th>
                            <th scope="row" class="text-center text-bold">
                                <a href="{{ route('guest.program.show', ['program_id' => decbin(optional($program)->id), 'program_title' => optional($program)->short_name]) }}" target="_blank" class="text-bold p-2 bg-dark text-white" data-toggle="tooltip" data-title="{{ __('View Details') }}" style="font-size: 13px;"><i class="ti-info"></i></a>

                                @if ($data->status > 0)
                                    <a href="#" target="_blank" class="text-bold p-2 bg-ucap" data-toggle="tooltip" data-title="{{ __('Live Chat') }}" style="font-size: 13px;"><i class="ti-comment"></i></a>
                                @endif
                            </th>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <hr>

    <div class="row cart-calutions">
        <div class="col-md-5 order-xs-2">
            <h6 class="text-ucap text-bold">{{ __('Terms & Conditions') }}</h6>
            <hr>
            {!! ucap_get('apply_condition') !!}
        </div>
        <div class="col-md-7 order-xs-1">
            <table class="table table-bordered table-responsive-sm mb-0">
                <tbody>
                    <tr>
                        <th scope="col" class="text-left">{{ __('Total Application Fees: ') }}</th>
                        <td scope="row" class="text-right">{{ ucap_get('currency_sign') . $total_amount }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="text-left">{{ __('Tax: ') }}</th>
                        <td scope="row" class="text-right">{{ ucap_get('currency_sign') . $tax }}</td>
                    </tr>
                    <tr>
                        <th scope="col" class="text-left">{{ __('Discount: ') }}</th>
                        <td scope="row" class="text-right">{{ ucap_get('currency_sign') . $discount }}</td>
                    </tr>
                    <tr class="bg-ucap">
                        <th scope="col" class="text-left text-white text-bold">{{ __('Subtotal: ') }}</th>
                        <td scope="row" class="text-right text-white text-bold">{{ ucap_get('currency_sign') . (($total_amount - $discount) + $tax)  }}</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script>
        // Custom Script Here
        $(document).ready(function() {
            // Table Row Link
            $('*[data-href]').click(function(){
                window.location = $(this).data('href');
                return false;
            });
        });
    </script>
@endsection
