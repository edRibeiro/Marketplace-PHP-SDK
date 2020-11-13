<?php

namespace PayPalCheckoutSdk\PartnerReferrals;

use PayPalCheckoutSdk\Core\Request\HeaderPartnerAttributionIdTrait;
use PayPalCheckoutSdk\Core\Request\HeaderPreferTrait;
use PayPalCheckoutSdk\Core\Request\HeaderRequestIdTrait;

class PartnerReferralsGetRequest extends AbstractPartnerReferralsRequest
{
    use HeaderPartnerAttributionIdTrait, HeaderPreferTrait, HeaderRequestIdTrait;

    /**
     * @param string $partnerId
     * @param string $merchantId
     */
    public function __construct(string $partnerId, string $merchantId)
    {
        parent::__construct(
            $this->buildPathWithPlaceholders(
                '/{partner_referral_id}/merchant-integrations/{merchant_id}',
                ['partner_referral_id' => $partnerId, 'merchant_id' => $merchantId]
            ),
            'GET'
        );
    }

    /**
     * @inheritDoc
     */
    protected function possiblePrefix(): string
    {
        return '/v1/customer/partners';
    }
}
