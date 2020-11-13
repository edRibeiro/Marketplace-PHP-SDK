<?php

namespace Test\Kit;

use PayPalCheckoutSdk\Subscriptions\SubscriptionCreatePlanRequest;
use PayPalCheckoutSdk\Subscriptions\SubscriptionCreateProductRequest;
use PayPalHttp\HttpClient;
use PayPalHttp\HttpResponse;

trait SubscriptionsRequestTrait
{

    /**
     * @param HttpClient $client
     *
     * @return HttpResponse
     */
    protected function createSubscriptionCreateProductRequest($client)
    {
        $request = new SubscriptionCreateProductRequest();
        $request->prefer('return=representation');
        $request->payPalPartnerAttributionId(getenv('BN_CODE'));
        $request->body = $this->buildRequestBodyForSubscriptionsCreateProductRequest();
        return $client->execute($request);
    }

    /**
     * @return array
     */
    private function buildRequestBodyForSubscriptionsCreateProductRequest()
    {
        return [
            'name' => 'Video Streaming Service',
            'description' => 'Video streaming service',
            'type' => 'SERVICE',
            'category' => 'SOFTWARE'
        ];
    }

    /**
     * @param HttpClient $client
     *
     * @return HttpResponse
     */
    protected function createSubscriptionCreatePlanRequest($client)
    {
        $request = new SubscriptionCreatePlanRequest();
        $request->prefer('return=representation');
        $request->payPalPartnerAttributionId(getenv('BN_CODE'));
        $request->body = $this->buildRequestBodyForSubscriptionsCreatePlanRequest();
        return $client->execute($request);
    }

    /**
     * @return array
     */
    private function buildRequestBodyForSubscriptionsCreatePlanRequest()
    {
        return [
            'product_id' => 'test-video-stream',
            'name' => '4 Weekly Plan',
            'description' => '4 Weekly recurring billing plan',
            'billing_cycles' => [
                [
                    'frequency' => [
                        'interval_unit' => 'WEEK',
                        'interval_count' => 4
                    ],
                    'tenure_type' => 'REGULAR',
                    'sequence' => 1,
                    'total_cycles' => 13,
                    'pricing_scheme' => [
                        'fixed_price' => [
                            'value' => 4,
                            'currency_code' => 'GBP'
                        ]
                    ]
                ]
            ],
            'payment_preferences' => [
                'auto_bill_outstanding' => true,
                'payment_failure_threshold' => 3
            ]
        ];
    }
}
