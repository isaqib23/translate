<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserPayment;
use App\Models\UserRequests;
use Illuminate\Support\Facades\Http;
use App\Services\StripeService;
use App\Services\TabbyService;
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
            'payment_url' => $this->handleCheckout($firstRecord->amount, $request->segment(2), $request->segment(3)),
        ], 200);
    }

    public function handleCheckout($amount, $user_uuid, $payment_method)
    {
        if($payment_method == "stripe"){
            $stripe = new StripeService();
            $session = $stripe->sessionCreate($amount, $user_uuid);
            return $session->url;
        }elseif($payment_method == "tabby"){
            $tabby = new TabbyService();

            $items = collect([]); // array to save your products

            // add first product
            $items->push([
                'title' => 'Document Translating',
                'quantity' => 1,
                'unit_price' => $amount,
                'category' => 'document',
            ]);

            $order_data = [
                'amount'=> $amount,
                'buyer_email' => 'ali@gmail.com',
                'order_id'=> $user_uuid,
                'success-url'=> "/",
                'cancel-url' => "/",
                'failure-url' => "/",
                'items' => $items,
            ];

            $payment = $tabby->createSession($order_data);
            $id = $payment->id;
            return $payment->configuration->available_products->installments[0]->web_url;
        }

        return url('/');
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

    public function bio(Request $request)
    {
            return view('frontend.bio');
    }

    public function services(Request $request)
    {
            return view('frontend.services');
    }

}
