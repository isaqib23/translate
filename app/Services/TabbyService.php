<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class TabbyService
{
    public $base_url = "https://api.tabby.ai/api/v2/";
    public $pk_test = "pk_test_65b792b2-262c-4ad1-9ade-7d4c590505bd";
    public $sk_test = "sk_test_0c0d1506-b58e-4346-8587-dd0b787fb2ac";

    public function createSession($data)
    {
        try {
            $body = $this->getConfig($data);
            //dd($body);
            $http = Http::withToken($this->pk_test)->baseUrl($this->base_url);

            $response = $http->post('checkout', $body);

            // Check if the response is successful
            if ($response->successful()) {
                return $response->object();
            } else {
                // Handle non-successful responses
                return (object) [
                    'error' => true,
                    'message' => 'Non-successful response from API',
                    'status' => $response->status(),
                    'body' => $response->body(),
                ];
            }
        } catch (\Illuminate\Http\Client\RequestException $e) {
            // This will catch all 4xx and 5xx errors
            return (object) [
                'error' => true,
                'message' => 'HTTP request error',
                'exception' => $e->getMessage(),
            ];
        } catch (\Exception $e) {
            // This will catch any other exceptions
            return (object) [
                'error' => true,
                'message' => 'Unexpected error',
                'exception' => $e->getMessage(),
            ];
        }
    }


    public function getSession($payment_id)
    {
        $http = Http::withToken($this->sk_test)->baseUrl($this->base_url);

        $url = 'checkout/'.$payment_id;

        $response = $http->get($url);

        return $response->object();
    }

    public function getConfig($data)
    {
        $body= [];

        $body = [
            "payment" => [
                "amount" => $data['amount'],
                "currency" => "AED",
                "description" =>  "Document Translating",
                "buyer" => [
                    "phone" => "971568542547",
                    "email" => $data['buyer_email'],
                    "name" => "Saqib",
                    "dob" => "2019-08-24",
                ],
                "shipping_address" => [
                    "city" => "Dubai",
                    "address" =>  "United Arab Emirates",
                    "zip" => "00000",
                ],
                "order" => [
                    "tax_amount" => "0.00",
                    "shipping_amount" => "0.00",
                    "discount_amount" => "0.00",
                    "updated_at" => "2019-08-24T14:15:22Z",
                    "reference_id" => $data['order_id'],
                    "items" =>
                        $data['items']
                ],
                "buyer_history" => [
                    "registered_since"=> "2019-08-24T14:15:22Z",
                    "loyalty_level"=> 0,
                ],
            ],
            "lang" => app()->getLocale(),
            "merchant_code" => "ae",
            "merchant_urls" => [
                "success" => $data['success-url'],
                "cancel" => $data['cancel-url'],
                "failure" => $data['failure-url'],
            ]
        ];

        return $body;
    }
}
