<?php

namespace Test\Kit;

use PayPalCheckoutSdk\Webhooks\WebhookCreateRequest;
use PayPalHttp\HttpClient;
use PayPalHttp\HttpResponse;

trait WebhooksRequestTrait
{

    /**
     * @param HttpClient $client
     * @return HttpResponse
     */
    protected function webhooksCreateRequest(HttpClient $client): HttpResponse
    {
        $request = new WebhookCreateRequest();
        $request->prefer('return=representation');
        $request->body = $this->buildRequestBodyForWebhooksCreateRequest();
        return $client->execute($request);
    }

    /**
     * @return array
     */
    private function buildRequestBodyForWebhooksCreateRequest(): array
    {
        return [
            'url' => 'https://domain.com/test-webhook',
            'event_types' => [
                [
                    'name' => 'PAYMENT.AUTHORIZATION.CREATED'
                ],
                [
                    'name' => 'PAYMENT.AUTHORIZATION.VOIDED'
                ]
            ]
        ];
    }
}
