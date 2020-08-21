<?php

namespace Test\Kit;

use PayPalCheckoutSdk\PartnerReferrals\PartnerReferralsCreateRequest;
use PayPalHttp\HttpClient;
use PayPalHttp\HttpResponse;

trait PartnerReferralsCreateRequestTrait
{

    /**
     * @param HttpClient $client
     *
     * @return HttpResponse
     */
    protected function createPartnerReferralsCreateRequest($client)
    {
        $request = new PartnerReferralsCreateRequest();
        $request->prefer("return=representation");
        $request->payPalPartnerAttributionId(getenv('BN_CODE'));
        $request->body = $this->buildRequestBodyForPartnerReferralsCreateRequest();

        return $client->execute($request);
    }

    /**
     * @return array
     */
    private function buildRequestBodyForPartnerReferralsCreateRequest()
    {
        return [
            'requested_capabilities' => [
                [
                    'capability' => 'API_INTEGRATION',
                    'api_integration_preference' => [
                        'rest_third_party_details' => [
                            'partner_client_id' => getenv('CLIENT_ID'),
                            'feature_list' => [
                                'PAYMENT',
                                'REFUND',
                                'PARTNER_FEE',
                                'DELAY_FUNDS_DISBURSEMENT',
                                'ADVANCED_TRANSACTIONS_SEARCH'
                            ]
                        ],
                        'partner_id' => getenv('PARTNER_ID'), // @todo handle this better - model?
                        'rest_api_integration' => [
                            'integration_method' => 'PAYPAL',
                            'integration_type' => 'THIRD_PARTY'
                        ]
                    ]
                ]
            ],
            'web_experience_preference' => [
                'partner_logo_url' => 'https://www.example.com/images/logo.png',
                'return_url' => 'https://www.example.com/paypal/return',
                'action_renewal_url' => 'https://www.example.com/paypal/renew'
            ],
            'collected_consents' => [
                [
                    'type' => 'SHARE_DATA_CONSENT',
                    'granted' => true
                ]
            ],
            'products' => [
                'EXPRESS_CHECKOUT'
            ]
        ];
    }
}
