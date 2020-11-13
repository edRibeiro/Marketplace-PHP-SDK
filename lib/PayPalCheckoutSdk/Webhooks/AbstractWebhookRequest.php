<?php

namespace PayPalCheckoutSdk\Webhooks;

use PayPalCheckoutSdk\Core\AbstractHttpRequest;

abstract class AbstractWebhookRequest extends AbstractHttpRequest
{

    /**
     * @inheritDoc
     */
    protected function possiblePrefix(): string
    {
        return '/v1/notifications/webhooks';
    }

}
