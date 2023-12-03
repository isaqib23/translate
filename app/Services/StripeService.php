<?php

namespace App\Services;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Http;

class StripeService
{
    public function sessionCreate($amount,$user_uuid){
        Stripe::setApiKey(config('app.stripe_key'));
        return StripeSession::create([
               'payment_method_types' => ['card'],
               'line_items' => [[
                   'price_data' => [
                       'currency' => 'aed',
                       'product_data' => [
                           'name' => 'Custom Payment',
                       ],
                       'unit_amount' => $amount,
                   ],
                   'quantity' => 1,
               ]],
               'metadata' => [
                   'user_uuid' => $user_uuid,
               ],
               'mode' => 'payment',
               'success_url' => url('/payment_status/success?session_id={CHECKOUT_SESSION_ID}'),
               'cancel_url' => url('/payment_status/cancel?session_id={CHECKOUT_SESSION_ID}'),
           ]);
    }
}
