<?php

namespace PayPalCheckoutSdk\Webhooks;

use PayPalCheckoutSdk\Core\Request\HeaderPartnerAttributionIdTrait;
use PayPalCheckoutSdk\Core\Request\HeaderPreferTrait;
use PayPalCheckoutSdk\Core\Request\HeaderRequestIdTrait;

class WebhookGetRequest extends AbstractWebhookRequest
{
    use HeaderPartnerAttributionIdTrait, HeaderPreferTrait, HeaderRequestIdTrait;

    /**
     * @param string $webhookId
     */
    public function __construct(string $webhookId)
    {
        parent::__construct(
            $this->buildPathWithPlaceholders(
                '/{webhook_id}?',
                ['webhook_id' => $webhookId]
            ),
            'GET'
        );
    }

}
