<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPayment;
use App\Models\UserRequests;
use Illuminate\Support\Facades\Http;
use Stripe\Stripe;
use Stripe\Checkout\Session as StripeSession;

class FrontendController extends Controller
{
    public function index()
    {
    //dd(Hash::make('12345678'));
        $message = request()->query('message');
        return view('frontend.index', compact('message'));
    }

    public function success(Request $request) {
        $message = "";
        return view('frontend.success', compact('message'));
    }

    public function verify_status(Request $request){
        $userPayment = new UserPayment;
        $firstRecord = $userPayment::whereNotNull('amount')
                         ->where('amount', '<>', '')
                         ->where('user_uuid', $request->segment(2))
                         ->first();
        if ($firstRecord && ($firstRecord->status == "updated" || $firstRecord->status == "accepted" || $firstRecord->status == "cancel")) {
            $userRequest = new UserRequests;
            $user = $userRequest::where('user_uuid', $request->segment(2))->first();
            return response()->json([
            'success' => true,
            'amount' => $firstRecord->amount,
             ], 200);
        }elseif ($firstRecord && ($firstRecord->status == "paid")) {
            return response()->json(['error' => 'No files uploaded'], 403);
        } else {
            return response()->json(['error' => 'No files uploaded'], 400);
        }
    }

    public function verify_payment(Request $request){
        $userPayment = new UserPayment;
        $firstRecord = $userPayment::whereNotNull('amount')
                                 ->where('amount', '<>', '')
                                 ->where('user_uuid', $request->segment(2))
                                 ->first();
        $userPayment::whereNotNull('amount')
                         ->where('amount', '<>', '')
                         ->where('user_uuid', $request->segment(2))
                         ->update(['status' => 'accepted']);
        return response()->json([
            'payment_url' => $this->handleCheckout($firstRecord->amount, $request->segment(2)),
        ], 200);
    }

    public function handleCheckout($amount, $user_uuid)
    {
        // Set your secret key
        Stripe::setApiKey("sk_test_51Nm90nE1ydFAXdZx3MIiBQnxQW3NmFjq7kBFJRcz2dlciPMW1Te4ouKh5rEYN4oJQr5kXdNRyqTSDpDz0jDlR4wR00oG3x9WRt");

        // Calculate the order amount in cents
        $amount = $amount * 100;

        // Create a new Stripe checkout session
        $session = StripeSession::create([
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

        // Redirect to Stripe Checkout
        return $session->url;
    }

    public function payment_status(Request $request)
    {
        Stripe::setApiKey("sk_test_51Nm90nE1ydFAXdZx3MIiBQnxQW3NmFjq7kBFJRcz2dlciPMW1Te4ouKh5rEYN4oJQr5kXdNRyqTSDpDz0jDlR4wR00oG3x9WRt");

        $sessionId = $request->query('session_id');
        if ($sessionId) {
            $session = StripeSession::retrieve($sessionId);
            $status = "cancel";
            if($request->segment(2) == "success"){
                $status = "paid";
            }
            // Retrieve your custom data from the session
            $user_uuid = $session->metadata->user_uuid;

            $userPayment = new UserPayment;
            $userPayment::whereNotNull('amount')
             ->where('amount', '<>', '')
             ->where('user_uuid', $user_uuid)
             ->update(['status' => $status]);

            return view('frontend.payment_status', compact('status'));
        }
    }

}
