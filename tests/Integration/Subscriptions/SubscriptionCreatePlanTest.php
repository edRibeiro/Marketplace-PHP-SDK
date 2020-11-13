<?php

namespace Test\Integration\Subscriptions;

use Test\IntegrationTestCase;
use Test\Kit\SubscriptionsRequestTrait;

class SubscriptionCreatePlanTest extends IntegrationTestCase
{
    use SubscriptionsRequestTrait;

    /**
     * testSubscriptionCreatePlanRequest
     */
    public function testSubscriptionCreatePlanRequest(): void
    {
        $response = $this->createSubscriptionCreatePlanRequest($this->client);
        self::assertEquals(201, $response->statusCode);
        self::assertNotNull($response->result);

        /** @var object $product */
        $product = $response->result;
        self::assertNotNull($product->links);
        self::assertCount(3, $product->links);

        $firstHATEOAS = $product->links[0];
        self::assertNotNull($firstHATEOAS->href);
        self::assertEquals("self", $firstHATEOAS->rel);
        self::assertEquals("GET", $firstHATEOAS->method);

        $secondHATEOAS = $product->links[1];
        self::assertNotNull($secondHATEOAS->href);
        self::assertEquals("edit", $secondHATEOAS->rel);
        self::assertEquals("PATCH", $secondHATEOAS->method);
    }
}
