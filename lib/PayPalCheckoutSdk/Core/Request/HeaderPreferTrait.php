<?php

namespace PayPalCheckoutSdk\Core\Request;

trait HeaderPreferTrait
{
    /**
     * @param string $prefer
     */
    public function prefer(string $prefer): void
    {
        $this->headers["Prefer"] = $prefer;
    }
}
