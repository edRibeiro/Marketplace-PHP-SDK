<?php

namespace Test\Integration\Webhooks;

use PayPalCheckoutSdk\Webhooks\WebhookGetRequest;
use Test\IntegrationTestCase;

class WebhooksGetTest extends IntegrationTestCase
{

    /**
     * testWebhooksDeleteRequest
     */
    public function testWebhooksGetRequest(): void
    {
        self::markTestSkipped('Need an approved Webhook ID to execute this test.');
        $request = new WebhookGetRequest('WEBHOOK-ID');
        $response = $this->client->execute($request);

        self::assertEquals(200, $response->statusCode);
        self::assertNull($response->result);
    }
}
