<?php

namespace App\Services;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;
use Illuminate\Support\Facades\Http;

class StripeService
{
    public $base_url = "https://api.tabby.ai/api/v2/";
    public $pk_test = "pk_test_65b792b2-262c-4ad1-9ade-7d4c590505bd";
    public $sk_test = "sk_test_0c0d1506-b58e-4346-8587-dd0b787fb2ac";

    public function sessionCreate($amount,$user_uuid){
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
