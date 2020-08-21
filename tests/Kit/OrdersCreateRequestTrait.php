<?php

namespace Test\Kit;

use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpClient;
use PayPalHttp\HttpResponse;

trait OrdersCreateRequestTrait
{

    /**
     * @return array
     */
    private function buildRequestBodyForOrdersCreateRequest()
    {
        return [
            'intent' => 'CAPTURE',
            'purchase_units' => [
                [
                    'payee' => [
                        'email_address' => getenv('MERCHANT_EMAIL'), // @todo handle this better - model?
                        'merchant_id' => getenv('MERCHANT_ID')       //
                    ],
                    'payment_instruction' => [
                        'disbursement_mode' => 'INSTANT',
                        'platform_fees' => [[
                            'amount' => [
                                'currency_code' => 'GBP',
                                'value' => '0.40'
                            ]
                        ]]
                    ],
                    'reference_id' => 'test_ref_id1',
                    'amount' => [
                        'value' => '4.00',
                        'currency_code' => 'GBP',
                        'breakdown' => [
                            'item_total' => [
                                'currency_code' => 'GBP',
                                'value' => '4.00'
                            ]
                        ]
                    ],
                    'items' => [
                        [
                            'name' => 'Test Item',
                            'unit_amount' => [
                                'currency_code' => 'GBP',
                                'value' => '1.00'
                            ],
                            'quantity' => '4',
                            'sku' => 'test-item'
                        ]
                    ]
                ],
            ]
        ];
    }

    /**
     * @param HttpClient $client
     *
     * @return HttpResponse
     */
    protected
    function createOrdersCreateRequest($client)
    {
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->payPalPartnerAttributionId(getenv('BN_CODE'));
        $request->body = $this->buildRequestBodyForOrdersCreateRequest();

        return $client->execute($request);
    }
}
