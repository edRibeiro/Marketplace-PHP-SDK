<?php

namespace PayPalCheckoutSdk\Webhooks;

use PayPalCheckoutSdk\Core\Request\HeaderPartnerAttributionIdTrait;
use PayPalCheckoutSdk\Core\Request\HeaderPreferTrait;
use PayPalCheckoutSdk\Core\Request\HeaderRequestIdTrait;

class WebhookListRequest extends AbstractWebhookRequest
{
    use HeaderPartnerAttributionIdTrait, HeaderPreferTrait, HeaderRequestIdTrait;

    public function __construct()
    {
        parent::__construct('?', 'GET');
    }
}
