<?php

namespace Test\Integration\Orders;

use PayPalCheckoutSdk\Orders\OrdersAuthorizeRequest;
use Test\IntegrationTestCase;
use Test\Kit\OrdersRequestTrait;

class OrdersAuthorizeTest extends IntegrationTestCase
{

    use OrdersRequestTrait;

    /**
     * testOrdersAuthorizeRequest
     */
    public function testOrdersAuthorizeRequest(): void
    {
        self::markTestSkipped("Need an approved Order ID to execute this test.");
        $request = new OrdersAuthorizeRequest('ORDER-ID');

        $response = $this->client->execute($request);
        self::assertEquals(201, $response->statusCode);
        self::assertNotNull($response->result);
    }
}
