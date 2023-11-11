<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\UserPayment;
use App\Models\UserRequests;
use Illuminate\Support\Facades\Http;

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
                         ->where('status', 'updated')
                         ->first();
        if ($firstRecord) {
            $userRequest = new UserRequests;
            $user = $userRequest::where('user_uuid', $request->segment(2))->first();
            /*$response = Http::withHeaders([
                'Content-Type' => 'application/json',
                'secret_key' => 'test_$2y$10$T-1KoS0cwWGN0p4N2TLMi.JUdq3LH-DxFMF2BuBbUZVM1WyQoO95i',
            ])->post('https://api.foloosi.com/aggregatorapi/web/initialize-setup', [
                'transaction_amount' => $firstRecord->amount,
                'currency' => 'AED',
                'customer_email' => $user->email,
            ]);

            // Get the response body
            $body = $response->body();*/
            return response()->json([
            'success' => true,
            'merchant_key' => 'test_$2y$10$sT89B7vDbr.8Lx3GcURdq.4.tOEdCRtq1RXQ1afl-FOQmNB0f7YZe',
             "data" => [
                "customer_name" => $user->email,
                "customer_email" => filter_var($user->mobile, FILTER_VALIDATE_EMAIL) ? $user->mobile : "",
                "customer_mobile" => filter_var($user->mobile, FILTER_VALIDATE_EMAIL) ? "" : $user->mobile,
                "site_return_url" => "https://translate.galleypilot.com/",
                'transaction_amount' => $firstRecord->amount,
                'currency' => 'AED',
             ]
             ], 200);
        } else {
            return response()->json(['error' => 'No files uploaded'], 400);
        }
    }
}
