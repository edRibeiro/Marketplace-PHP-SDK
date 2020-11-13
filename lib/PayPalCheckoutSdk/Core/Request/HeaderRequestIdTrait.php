<?php

namespace PayPalCheckoutSdk\Core\Request;

trait HeaderRequestIdTrait
{
    /**
     * @param string $payPalRequestId
     */
    public function payPalRequestId(string $payPalRequestId): void
    {
        $this->headers["PayPal-Request-Id"] = $payPalRequestId;
    }
}
