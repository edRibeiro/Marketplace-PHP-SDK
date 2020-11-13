<?php

namespace PayPalCheckoutSdk\Webhooks;

use PayPalCheckoutSdk\Core\AbstractHttpRequest;
use PayPalCheckoutSdk\Core\Request\HeaderPartnerAttributionIdTrait;
use PayPalCheckoutSdk\Core\Request\HeaderPreferTrait;
use PayPalCheckoutSdk\Core\Request\HeaderRequestIdTrait;

class WebhookVerifyRequest extends AbstractHttpRequest
{
    use HeaderPartnerAttributionIdTrait, HeaderPreferTrait, HeaderRequestIdTrait;

    public function __construct()
    {
        parent::__construct('/v1/notifications/verify-webhook-signature', 'POST');
    }
}
