<?php

namespace PayPalCheckoutSdk\Subscriptions;

use PayPalCheckoutSdk\Core\Request\HeaderPartnerAttributionIdTrait;
use PayPalCheckoutSdk\Core\Request\HeaderPreferTrait;
use PayPalCheckoutSdk\Core\Request\HeaderRequestIdTrait;

class SubscriptionCreateProductRequest extends AbstractSubscriptionRequest
{
    use HeaderPartnerAttributionIdTrait, HeaderPreferTrait, HeaderRequestIdTrait;

    public function __construct()
    {
        parent::__construct('?', 'POST');
    }

    /**
     * @inheritDoc
     */
    protected function possiblePrefix(): string
    {
        return '/v1/catalogs/products';
    }
}
