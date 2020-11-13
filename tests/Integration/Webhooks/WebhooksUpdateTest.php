<?php

namespace Test\Integration\Webhooks;

use PayPalCheckoutSdk\Webhooks\WebhookUpdateRequest;
use Test\IntegrationTestCase;
use Test\Kit\WebhooksRequestTrait;

class WebhooksUpdateTest extends IntegrationTestCase
{
    use WebhooksRequestTrait;

    /**
     * testWebhooksCreateRequest
     */
    public function testWebhooksCreateRequest(): void
    {
        self::markTestSkipped('Need an approved Webhook ID to execute this test.');
        $request = new WebhookUpdateRequest('WEBHOOK-ID');
        $request->body = $this->buildRequestBody();
        $response = $this->client->execute($request);

        self::assertEquals(201, $response->statusCode);
        self::assertNotNull($response->result);
    }

    /**
     * @return array[]
     */
    private function buildRequestBody(): array
    {
        return [
            [
                'op' => 'replace',
                'path' => '/event_types',
                'value' => [
                    ['name' => 'PAYMENT.SALE.REFUNDED']
                ]
            ]
        ];
    }
}
