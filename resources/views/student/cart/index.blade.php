@extends('student.layouts.student')

@section('page_title', __('Application Cart'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    /* #studentCart{
        display: none;
    } */
    .dashboard_container_footer {
        padding: 15px 20px;
        border-top: 1px solid #f2f7fd;
    }
    .input-group-sm .form-control{
        height: 35px;
    }
    .input-group-sm button{
        line-height: 0.25;
    }
    </style>
@endsection

@section('student_content')

<!-- Start Content Section -->
<div class="dashboard_container">
    <div class="dashboard_container_header">
        <div class="dashboard_fl_1">
            <h4 class="text-dark text-center">
                <b>{{ __('My ') }} <span class="text-ucap">{{ __('Application Cart') }}</span></b>
            </h4>
        </div>
    </div>

    <div class="dashboard_container_body">
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead class="bg-ucap">
                    <tr>
                        <th scope="col" class="text-center">{{ __('#') }}</th>
                        <th scope="col" class="text-center">{{ __('Program') }}</th>
                        <th scope="col" class="text-center">{{ __('Session') }}</th>
                        <th scope="col" class="text-center">{{ __('University') }}</th>
                        <th scope="col" class="text-center">{{ __('Application Fee') }}</th>
                        <th scope="col" class="text-center">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                @php
                    $cart = Cart::get();
                    $programs = (array)$cart['programs'];
                    $total_amount = 0.00;
                    $tax = ucap_get('tax') ?? 0.00;
                    $discount = 0.00;
                    $carted = count($programs);
                @endphp
                <tbody>
                    @foreach ($programs as $list => $temp)
                    @php
                        $program = Cart::getProgram($temp['program']);
                        $session = Cart::getSession($temp['session']);
                        $total_amount += $program->application_fee;
                    @endphp
                    <tr>
                        <th scope="row" class="text-center">{{ $list+1 }}</th>
                        <th scope="row" class="text-center">{{ $program->name }}</th>
                        <th scope="row" class="text-center">{{ $session->name }}</th>
                        <th scope="row" class="text-center">{{ optional(optional($program->faculty)->university)->name }}</th>
                        <th scope="row" class="text-center">{{ ucap_get('currency_sign').($program->application_fee??'0.00') }}</th>
                        <td scope="row" class="text-center">
                            <div class="dash_action_link">
                                <a href="{{ route('student.cart.remove', ['program_id' => decbin($program->id)]) }}" class="btn btn-danger btn-sm bg-ucap text-bold confirm" confirm="{{ __('Are You Sure Want To Remove?') }}">
                                    <i class="ti-trash text-bold"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                    @if($carted < 1)

                    <tr>
                        <th scope="row" colspan="5"  class="text-center">{{ __('No program in cart') }}</th>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
    <div class="dashboard_container_footer">
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
                        {{-- <tr>
                            <th scope="col" class="text-left">
                                <form action="#" method="post">
                                    @csrf
                                    <div class="input-group input-group-sm border-0">
                                        <input type="text" name="coupon" class="form-control" value="{{ old('coupon') }}" placeholder="Coupon Code" required>
                                        <div class="input-group-append">
                                            <button class="btn btn-dark bg-ucap text-bold text-uppercase" type="submit">{{ __('Apply') }}</button>
                                        </div>
                                    </div>
                                </form>
                            </th>
                            <td scope="row" class="text-right">{{ '$26.10' }}</td>
                        </tr> --}}
                        <tr class="bg-ucap">
                            <th scope="col" class="text-left text-white text-bold">{{ __('Subtotal: ') }}</th>
                            <td scope="row" class="text-right text-white text-bold">{{ ucap_get('currency_sign') . (($total_amount - $discount) + $tax)  }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <br>

        <div class="row card-actions">
            <div class="col-12">
                {{-- <a href="javascript:void(0);" data-toggle="modal" data-target="#selectPayment" class="btn btn-dark bg-ucap text-bold float-right ml-2">{{ __('Pay & Apply') }}</a> --}}
                <a href="{{ route('student.cart.payment') }}" class="btn btn-dark bg-ucap text-bold float-right ml-2">{{ __('Pay & Apply') }}</a>
                <a href="{{ route('guest.homepage.index') }}" class="btn btn-dark text-bold float-right confirm" confirm="{{ __('Are You Sure Want To Cancel?') }}">{{ __('Cancel') }}</a>
            </div>

            {{-- @include('student.cart.modals.payment') --}}
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
    </script>
@endsection
