<?php

namespace Test\Integration\PartnerReferrals;

use Test\IntegrationTestCase;
use Test\Kit\PartnerReferralsCreateRequestTrait;

class PartnerReferralsCreateTest extends IntegrationTestCase
{
    use PartnerReferralsCreateRequestTrait;

    /**
     * testPartnerReferralsCreateRequest
     */
    public function testPartnerReferralsCreateRequest()
    {
        $response = $this->createPartnerReferralsCreateRequest($this->client);
        self::assertEquals(201, $response->statusCode);
        self::assertNotNull($response->result);
        $createdPartnerReferral = $response->result;
        self::assertNotNull($createdPartnerReferral->links);
        self::assertCount(2, $createdPartnerReferral->links);
        $firstHATEOAS = $createdPartnerReferral->links[0];
        self::assertNotNull($firstHATEOAS->href);
        self::assertEquals("self", $firstHATEOAS->rel);
        self::assertEquals("GET", $firstHATEOAS->method);
        $secondHATEOAS = $createdPartnerReferral->links[1];
        self::assertNotNull($secondHATEOAS->href);
        self::assertEquals("action_url", $secondHATEOAS->rel);
        self::assertEquals("GET", $secondHATEOAS->method);
    }
}
