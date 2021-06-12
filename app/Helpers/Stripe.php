<?php

use App\Models\PaymentGateway;

if (!function_exists('set_stripe')) {

    /**
     * description
     *
     * @param
     * @return
     */
    function set_stripe()
    {
        $stripe = PaymentGateway::whereName('stripe')->whereStatus(true)->first();
        $currency = optional($stripe)->currency ?? ucap_get('currency_name');
        $currency = $currency ?? 'usd';
        $secret = optional($stripe)->secret ?? env('STRIPE_SECRET');
        return array(
            'currency' => $currency,
            'secret' => $secret,
        );
    }
}
