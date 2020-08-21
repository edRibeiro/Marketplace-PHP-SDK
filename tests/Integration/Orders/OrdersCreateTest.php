<?php

namespace Test\Integration\Orders;

use Test\IntegrationTestCase;
use Test\Kit\OrdersCreateRequestTrait;

class OrdersCreateTest extends IntegrationTestCase
{
    use OrdersCreateRequestTrait;

    /**
     * testOrdersCreateRequest
     */
    public function testOrdersCreateRequest()
    {
        $response = $this->createOrdersCreateRequest($this->client);
        self::assertEquals(201, $response->statusCode);
        self::assertNotNull($response->result);
        $createdOrder = $response->result;
        self::assertNotNull($createdOrder->id);
        self::assertNotNull($createdOrder->purchase_units);
        self::assertCount(1, $createdOrder->purchase_units);
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
        $firstPurchaseUnit = $createdOrder->purchase_units[0];
        self::assertEquals("test_ref_id1", $firstPurchaseUnit->reference_id);
        self::assertEquals("GBP", $firstPurchaseUnit->amount->currency_code);
        self::assertEquals("4.00", $firstPurchaseUnit->amount->value);
    }
}
