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
use Srmklive\PayPal\Services\PayPal as PayPalClient;

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
        }elseif($payment_method == "foloosi"){
            return $this->foloosi_payment($amount, $user_uuid);
        }elseif($payment_method == "paypal"){
            return $this->processTransaction($amount, $user_uuid);
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
        Stripe::setApiKey(config('app.stripe_key'));

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
        }else{
            $status = "cancel";
            if($request->segment(2) == "success"){
                $status = "paid";
            }
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

    public function profile(Request $request)
    {
            return view('frontend.profile');
    }

    public function pricing(Request $request)
    {
            return view('frontend.pricing');
    }

    public function foloosi_payment_status(Request $request)
    {
        $userPayment = new UserPayment;
        $userPayment::whereNotNull('amount')
         ->where('amount', '<>', '')
         ->where('user_uuid', $request->segment(2))
         ->update(['status' => "paid"]);

        if($_POST['status'] == "success"){
            return redirect("/payment_status/success");
        }else{
            return redirect("/payment_status/cancel");
        }
    }

    public function foloosi_payment($amount, $user_uuid){
        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.foloosi.com/aggregatorapi/web/initialize-setup",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "transaction_amount=".$amount."&customer_unique_identifier=".$user_uuid."&currency=AED&customer_city=Dubai&billing_country=ARE&billing_state=Dubai&site_return_url=".url('/foloosi_payment_status/'.$user_uuid),
            CURLOPT_HTTPHEADER => array(
                'content-type: application/x-www-form-urlencoded',
                'merchant_key: '.config('app.foloosi_secret_key')
            ),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);
        if ($err) {
            return ["status" => false, "message" => $err];
        } else {
            $responseData = json_decode($response,true);
            $reference_token = $responseData['data']['reference_token'];

            return ["status" => true, "message" => $reference_token, "is_foloosi" => true, "merchant_key" => config('app.foloosi_merchant_key')];
        }
    }


    public function processTransaction($amount, $user_uuid)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();

        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "reference_id" => $user_uuid,
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => $amount
                    ]
                ]
            ]
        ]);

        if (isset($response['id']) && $response['id'] != null) {
            $approveHref = '';
            foreach ($response['links'] as $link) {
                if ($link['rel'] === 'approve') {
                    $approveHref = $link['href'];
                    break;
                }
            }

            return $approveHref;
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient;
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {
        $reference_id = $response['purchase_units'][0]['reference_id'];
        $userPayment = new UserPayment;
                $userPayment::whereNotNull('amount')
                 ->where('amount', '<>', '')
                 ->where('user_uuid', $reference_id)
                 ->update(['status' => "paid"]);
        return redirect()->to(url('/payment_status/success'));
        } else {
            return redirect()->to(url('/payment_status/cancel'));
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()->to(url('/payment_status/cancel'));
    }

}
