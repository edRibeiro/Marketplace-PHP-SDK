<?php

namespace PayPalCheckoutSdk\Core\Request;

trait HeaderPartnerAttributionIdTrait
{
    /**
     * @param string $payPalPartnerAttributionId
     */
    public function payPalPartnerAttributionId(string $payPalPartnerAttributionId): void
    {
        $this->headers["PayPal-Partner-Attribution-Id"] = $payPalPartnerAttributionId;
    }
}
