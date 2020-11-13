<?php

namespace Test\Integration\Webhooks;

use PayPalCheckoutSdk\Webhooks\WebhookDeleteRequest;
use Test\IntegrationTestCase;

class WebhooksDeleteTest extends IntegrationTestCase
{

    /**
     * testWebhooksDeleteRequest
     */
    public function testWebhooksDeleteRequest(): void
    {
        self::markTestSkipped('Need an approved Webhook ID to execute this test.');
        $request = new WebhookDeleteRequest('WEBHOOK-ID');
        $response = $this->client->execute($request);

        self::assertEquals(204, $response->statusCode);
        self::assertNull($response->result);
    }
}
