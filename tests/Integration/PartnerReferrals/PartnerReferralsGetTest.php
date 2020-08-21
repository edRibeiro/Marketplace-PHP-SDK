<?php

namespace Test\Integration\PartnerReferrals;

use PayPalCheckoutSdk\PartnerReferrals\PartnerReferralsGetRequest;
use Test\IntegrationTestCase;
use Test\Kit\PartnerReferralsCreateRequestTrait;

class PartnerReferralsGetTest extends IntegrationTestCase
{
    use PartnerReferralsCreateRequestTrait;

    /**
     * testPartnerReferralsGetRequest
     */
    public function testPartnerReferralsGetRequest()
    {
        self::markTestSkipped("Need an approved Partner ID & onboarded Merchant ID to execute this test.");
        $request = new PartnerReferralsGetRequest(getenv('PARTNER_ID'), getenv('MERCHANT_ID'));
        $request->payPalPartnerAttributionId(getenv('BN_CODE'));
        $response = $this->client->execute($request);
        print(json_encode($response));
        self::assertEquals(200, $response->statusCode);
        self::assertNotNull($response->result);
    }
}
