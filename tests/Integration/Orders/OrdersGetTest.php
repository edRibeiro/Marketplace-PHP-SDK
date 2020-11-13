<?php

namespace Test\Integration\Orders;

use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use Test\IntegrationTestCase;
use Test\Kit\OrdersRequestTrait;

class OrdersGetTest extends IntegrationTestCase
{
    use OrdersRequestTrait;

    /**
     * testOrdersGetRequest
     */
    public function testOrdersGetRequest(): void
    {
        $createdOrder = $this->createOrdersCreateRequest($this->client);

        /** @var object $createdOrderResult */
        $createdOrderResult = $createdOrder->result;

        $request = new OrdersGetRequest($createdOrderResult->id);
        $response = $this->client->execute($request);
        self::assertEquals(200, $response->statusCode);
        self::assertNotNull($response->result);

        /** @var object $createdOrder */
        $createdOrder = $response->result;
        self::assertNotNull($createdOrder->id);
        self::assertNotNull($createdOrder->purchase_units);
        self::assertCount(1, $createdOrder->purchase_units);

        $firstPurchaseUnit = $createdOrder->purchase_units[0];
        self::assertEquals("test_ref_id1", $firstPurchaseUnit->reference_id);
        self::assertEquals("GBP", $firstPurchaseUnit->amount->currency_code);
        self::assertEquals("4.00", $firstPurchaseUnit->amount->value);

        self::assertNotNull($createdOrder->create_time);
        self::assertNotNull($createdOrder->links);

        $foundApproveUrl = false;
        foreach ($createdOrder->links as $link) {
            if ("approve" === $link->rel) {
                $foundApproveUrl = true;
                self::assertNotNull($link->href);
                self::assertEquals("GET", $link->method);
            }
        }
        self::assertTrue($foundApproveUrl);
        self::assertEquals("CREATED", $createdOrder->status);
    }
}
