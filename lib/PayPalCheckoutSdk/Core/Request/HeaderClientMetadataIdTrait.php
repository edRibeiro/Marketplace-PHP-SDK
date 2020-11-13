<?php

namespace PayPalCheckoutSdk\Core\Request;

trait HeaderClientMetadataIdTrait
{
    /**
     * @param string $payPalClientMetadataId
     */
    public function payPalClientMetadataId(string $payPalClientMetadataId): void
    {
        $this->headers["PayPal-Client-Metadata-Id"] = $payPalClientMetadataId;
    }
}
