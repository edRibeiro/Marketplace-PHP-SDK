<?php

namespace Test\Integration\Orders;

use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use Test\IntegrationTestCase;

class OrdersCaptureTest extends IntegrationTestCase
{
    /**
     * testOrdersCaptureRequest
     */
    public function testOrdersCaptureRequest(): void
    {
        self::markTestSkipped("Need an approved Order ID to execute this test.");
        $request = new OrdersCaptureRequest('ORDER-ID');
        $response = $this->client->execute($request);

        self::assertEquals(201, $response->statusCode);
        self::assertNotNull($response->result);
    }
}
