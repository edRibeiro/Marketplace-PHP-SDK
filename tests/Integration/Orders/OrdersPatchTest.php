<?php

namespace Test\Integration\Orders;

use PayPalCheckoutSdk\Orders\OrdersGetRequest;
use PayPalCheckoutSdk\Orders\OrdersPatchRequest;
use Test\IntegrationTestCase;
use Test\Kit\OrdersRequestTrait;

class OrdersPatchTest extends IntegrationTestCase
{
    use OrdersRequestTrait;

    /**
     * testOrdersPatchRequest
     */
    public function testOrdersPatchRequest(): void
    {
        $createdOrder = $this->createOrdersCreateRequest($this->client);

        /** @var object $createdOrderResult */
        $createdOrderResult = $createdOrder->result;

        $request = new OrdersPatchRequest($createdOrderResult->id);
        $request->body = $this->buildRequestBody();
        $response = $this->client->execute($request);
        self::assertEquals(204, $response->statusCode);

        $request = new OrdersGetRequest($createdOrderResult->id);
        $response = $this->client->execute($request);
        self::assertEquals(200, $response->statusCode);
        self::assertNotNull($response->result);

        /** @var object $createdOrder */
        $createdOrder = $response->result;
        self::assertNotNull($createdOrder->id);
        self::assertNotNull($createdOrder->purchase_units);
        self::assertCount(1, $createdOrder->purchase_units);
        self::assertNotNull($createdOrder->create_time);
        self::assertNotNull($createdOrder->links);

        $firstPurchaseUnit = $createdOrder->purchase_units[0];
        self::assertEquals('test_ref_id1', $firstPurchaseUnit->reference_id);
        self::assertEquals('USD', $firstPurchaseUnit->amount->currency_code);
        self::assertEquals('200.00', $firstPurchaseUnit->amount->value);
        self::assertEquals('added_description', $firstPurchaseUnit->description);

        $foundApproveUrl = false;
        foreach ($createdOrder->links as $link) {
            if ('approve' === $link->rel) {
                $foundApproveUrl = true;
                self::assertNotNull($link->href);
                self::assertEquals('GET', $link->method);
            }
        }
        self::assertTrue($foundApproveUrl);
        self::assertEquals('CREATED', $createdOrder->status);
    }

    /**
     * @return array
     */
    private function buildRequestBody(): array
    {
        return [
            [
                "op" => "add",
                "path" => "/purchase_units/@reference_id=='test_ref_id1'/description",
                "value" => "added_description"
            ],
            [
                "op" => "replace",
                "path" => "/purchase_units/@reference_id=='test_ref_id1'/amount",
                "value" => [
                    "currency_code" => "GBP",
                    "value" => "200.00"
                ]
            ]
        ];
    }
}
