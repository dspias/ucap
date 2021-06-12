@extends('student.layouts.student')

@section('page_title', __('Card Details'))

@section('css_links')
    {{--  External CSS  --}}
@endsection

@section('custom_css')
    {{--  External CSS  --}}
    <style>
    /* Custom CSS Here */
    #studentCart{
        display: none;
    }
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

    /* Chrome, Safari, Edge, Opera */
    input::-webkit-outer-spin-button,
    input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    /* Firefox */
    input[type=number] {
        -moz-appearance: textfield;
    }

    .hide {
        display: none!important;
    }
    .form-control{
        font-size: 20px;
    }
    </style>
@endsection

@section('student_content')

@php
        $stripe_key = optional($stripe)->key ?? env('STRIPE_KEY');
@endphp

<!-- Start Content Section -->
<div class="dashboard_container">
    <form role="form" action="{{ route('student.cart.checkout') }}" method="post" class="stripe-payment" data-cc-on-file="false" data-stripe-publishable-key="{{ $stripe_key }}" id="stripe-payment">
        @csrf
        <div class="dashboard_container_header">
            <div class="dashboard_fl_1">
                <h4 class="text-dark text-center">
                    <b><span class="text-ucap">{{ __('Visa / Master Card') }}</span> {{ __('Details') }}</b>
                </h4>
            </div>
        </div>

        <div class="dashboard_container_body">
            <div class="form-row pt-3 pb-3">
                <div class="form-group col-md-12">
                    <label>{{ __('Name On Card') }}<sup class="text-ucap">*</sup></label>
                    <input type="text" name="name" size="4" class="form-control" value="{{ old('name') }}" placeholder="{{ __('John Doe *') }}" required>
                </div>

                <div class="form-group col-md-4">
                    <label>{{ __('Card Number') }}<sup class="text-ucap">*</sup></label>
                    <input type="number" size="20" maxlength="16" pattern="[0-9]*" inputmode="numeric" name="card_number" class="form-control card-num" value="{{ old('card_number') }}" placeholder="{{ __('Ex: 1234 1234 1234 1234') }}" required>
                </div>

                <div class="form-group col-md-5">
                    <label>{{ __('Expiration Month & Year') }}<sup class="text-ucap">*</sup></label>
                    <div class="input-group border-0">
                        <input type="number" size="2" name="month" min="1" max="12" minlength="1" maxlength="2" class="form-control card-expiry-month" value="{{ old('month') }}" placeholder="mm" required>

                        <input type="number" size="4" name="year" min="{{ date('y') }}" minlength="2" maxlength="2" class="form-control card-expiry-year" value="{{ old('year') }}" placeholder="yy" required>
                    </div>
                </div>

                <div class="form-group col-md-3">
                    <label>{{ __('Security Code (CVC)') }}<sup class="text-ucap">*</sup></label>
                    <input type="number" maxlength="16" pattern="[0-9]*" inputmode="numeric" name="card_cvc" class="form-control card-cvc" value="{{ old('card_cvc') }}" placeholder="{{ __('Ex: 123') }}" required>
                </div>
            </div>
            <div class="form-row row">
                <div class="col-md-12 hide error form-group">
                    <div class="alert-danger alert">{{ __('Please fix the errors before you begin.') }}</div>
                </div>
            </div>
        </div>

        <div class="dashboard_container_footer">
            <div class="row card-actions">
                <div class="col-12">
                    <button type="submit" class="btn btn-dark bg-ucap text-bold float-right ml-2">{{ __('Confirm Payment') }}</button>
                    <a href="{{ route('guest.homepage.index') }}" class="btn btn-dark text-bold float-right confirm" confirm="{{ __('Are You Sure Want To Cancel?') }}">{{ __('Cancel') }}</a>
                </div>
            </div>
        </div>
    </form>
</div>
<!-- End Content Section -->

@endsection



@section('script_links')
    {{--  External Javascript Links --}}
    <script type="text/javascript" src="https://js.stripe.com/v2/"></script>
@endsection

@section('custom_script')
    {{--  External Custom Javascript  --}}
    <script type="text/javascript">
        $(function () {
            var $form = $(".stripe-payment");
            $("form.stripe-payment").bind("submit", function (e) {
                var $form = $(".stripe-payment"),
                    inputVal = ["input[type=email]", "input[type=password]", "input[type=text]", "input[type=file]", "textarea"].join(", "),
                    $inputs = $form.find(".required").find(inputVal),
                    $errorStatus = $form.find("div.error"),
                    valid = true;
                $errorStatus.addClass("hide");

                $(".has-error").removeClass("has-error");
                $inputs.each(function (i, el) {
                    var $input = $(el);
                    if ($input.val() === "") {
                        $input.parent().addClass("has-error");
                        $errorStatus.removeClass("hide");
                        e.preventDefault();
                    }
                });

                if (!$form.data("cc-on-file")) {
                    e.preventDefault();
                    Stripe.setPublishableKey($form.data("stripe-publishable-key"));
                    Stripe.createToken(
                        {
                            number: $(".card-num").val(),
                            cvc: $(".card-cvc").val(),
                            exp_month: $(".card-expiry-month").val(),
                            exp_year: $(".card-expiry-year").val(),
                        },
                        stripeRes
                    );
                }
            });

            function stripeRes(status, response) {
                if (response.error) {
                    $(".error").removeClass("hide").find(".alert").text(response.error.message);
                } else {
                    var token = response["id"];
                    $form.find("input[type=text]").empty();
                    $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
                    $form.get(0).submit();
                }
            }
        });
    </script>
@endsection
