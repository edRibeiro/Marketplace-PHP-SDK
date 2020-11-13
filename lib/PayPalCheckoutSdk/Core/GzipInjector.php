<?php

namespace PayPalCheckoutSdk\Core;

use PayPalHttp\Injector;

class GzipInjector implements Injector
{
    /**
     * @param $httpRequest
     */
    public function inject($httpRequest): void
    {
        $httpRequest->headers['Accept-Encoding'] = 'gzip';
    }
}
