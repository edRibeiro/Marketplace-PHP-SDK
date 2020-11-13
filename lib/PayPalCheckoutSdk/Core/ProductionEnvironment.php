<?php

namespace PayPalCheckoutSdk\Core;

class ProductionEnvironment extends PayPalEnvironment
{

    /**
     * @inheritDoc
     */
    public function baseUrl(): string
    {
        return 'https://api.paypal.com';
    }
}
