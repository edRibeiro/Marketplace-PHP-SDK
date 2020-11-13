<?php

namespace Test\Unit\Core;

use PayPalCheckoutSdk\Core\AccessToken;
use Test\UnitTestCase;

class AccessTokenTest extends UnitTestCase
{
    /**
     * testCreateAccessToken
     */
    public function testCreateAccessToken(): void
    {
        $token = 'exampleToken';
        $tokenType = 'exampleTokenType';
        $expiresIn = 4711;

        $accessToken = new AccessToken(
            $token,
            $tokenType,
            $expiresIn
        );

        self::assertInstanceOf(AccessToken::class, $accessToken);
        self::assertSame($token, $accessToken->getToken());
        self::assertSame($tokenType, $accessToken->getTokenType());
        self::assertSame($expiresIn, $accessToken->getExpiresIn());
        self::assertFalse($accessToken->isExpired());
    }
}
