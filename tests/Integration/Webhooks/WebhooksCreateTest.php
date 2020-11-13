<?php

namespace Test\Integration\Webhooks;

use Test\IntegrationTestCase;
use Test\Kit\WebhooksRequestTrait;

class WebhooksCreateTest extends IntegrationTestCase
{
    use WebhooksRequestTrait;

    /**
     * testWebhooksCreateRequest
     */
    public function testWebhooksCreateRequest(): void
    {
        $response = $this->webhooksCreateRequest($this->client);
        self::assertEquals(201, $response->statusCode);
        self::assertNotNull($response->result);
    }
}
