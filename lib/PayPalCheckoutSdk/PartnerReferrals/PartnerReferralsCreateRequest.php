<?php

namespace PayPalCheckoutSdk\PartnerReferrals;

use PayPalCheckoutSdk\Core\Request\HeaderPartnerAttributionIdTrait;
use PayPalCheckoutSdk\Core\Request\HeaderPreferTrait;
use PayPalCheckoutSdk\Core\Request\HeaderRequestIdTrait;

class PartnerReferralsCreateRequest extends AbstractPartnerReferralsRequest
{
    use HeaderPartnerAttributionIdTrait, HeaderPreferTrait, HeaderRequestIdTrait;

    public function __construct()
    {
        parent::__construct('?', 'POST');
    }

    /**
     * @inheritDoc
     */
    protected function possiblePrefix()
    {
        return '/v1/customer/partner-referrals';
    }
}
