<?php

namespace PayPalCheckoutSdk\Subscriptions;

use PayPalCheckoutSdk\Core\Request\HeaderPartnerAttributionIdTrait;
use PayPalCheckoutSdk\Core\Request\HeaderPreferTrait;
use PayPalCheckoutSdk\Core\Request\HeaderRequestIdTrait;

class SubscriptionGetProductRequest extends AbstractSubscriptionRequest
{
    use HeaderPartnerAttributionIdTrait, HeaderPreferTrait, HeaderRequestIdTrait;

    /**
     * @param string $productId
     */
    public function __construct(string $productId)
    {
        parent::__construct(
            $this->buildPathWithPlaceholders(
                '/{product_id}?',
                ['product_id' => $productId]
            ),
            'GET'
        );
    }

    /**
     * @inheritDoc
     */
    protected function possiblePrefix()
    {
        return '/v1/catalogs/products';
    }
}
