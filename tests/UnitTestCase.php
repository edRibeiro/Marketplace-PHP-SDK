<?php

namespace Test;

use PayPalCheckoutSdk\Core\PayPalEnvironment;
use PHPUnit\Framework\TestCase;
use PHPUnit_Framework_MockObject_MockObject;

class UnitTestCase extends TestCase
{

    public const ENV_MOCK_AUTHORIZATION_STRING = '8WZPfS6KZqedxEJVbayV';
    public const ENV_MOCK_BASE_URL = 'https://unittests.checkout.paypal.com';

    /**
     * @return PayPalEnvironment|PHPUnit_Framework_MockObject_MockObject
     */
    protected function createEnvironmentMock()
    {
        $environmentMock = $this->getMockBuilder(PayPalEnvironment::class)
            ->disableOriginalConstructor()
            ->getMock();

        $environmentMock->method('authorizationString')
            ->willReturn(self::ENV_MOCK_AUTHORIZATION_STRING);
        $environmentMock->method('baseUrl')
            ->willReturn(self::ENV_MOCK_BASE_URL);

        return $environmentMock;
    }
}
