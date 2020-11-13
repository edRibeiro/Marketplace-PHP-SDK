<?php

namespace Test\Integration\Webhooks;

use PayPalCheckoutSdk\Webhooks\WebhookListRequest;
use Test\IntegrationTestCase;

class WebhooksListTest extends IntegrationTestCase
{

    /**
     * testWebhooksListRequest
     */
    public function testWebhooksListRequest(): void
    {
        $request = new WebhookListRequest();
        $response = $this->client->execute($request);

        self::assertEquals(200, $response->statusCode);
        self::assertNotNull($response->result);
    }
}
