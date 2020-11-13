<?php

namespace Test\Unit\Core;

use PayPalCheckoutSdk\Core\AccessTokenRequest;
use Test\UnitTestCase;

class AccessTokenRequestTest extends UnitTestCase
{

    /**
     * testBuildAccessTokenRequestWithoutRefreshToken
     */
    public function testBuildAccessTokenRequestWithoutRefreshToken(): void
    {
        $accessTokenRequest = new AccessTokenRequest($this->createEnvironmentMock());

        self::assertSame('/v1/oauth2/token', $accessTokenRequest->path);
        self::assertSame('POST', $accessTokenRequest->verb);

        self::assertSame('client_credentials', $accessTokenRequest->body['grant_type']);
        self::assertNotSame('refresh_token', $accessTokenRequest->body['grant_type']);

        self::assertSame('application/x-www-form-urlencoded', $accessTokenRequest->headers['Content-Type']);
        self::assertSame('Basic ' . self::ENV_MOCK_AUTHORIZATION_STRING, $accessTokenRequest->headers['Authorization']);
    }

    /**
     * testBuildAccessTokenRequestWithoutRefreshToken
     */
    public function testBuildAccessTokenRequestWithRefreshToken(): void
    {
        $refreshToken = 'exampleRefreshToken';
        $accessTokenRequest = new AccessTokenRequest($this->createEnvironmentMock(), $refreshToken);

        self::assertSame('/v1/oauth2/token', $accessTokenRequest->path);
        self::assertSame('POST', $accessTokenRequest->verb);

        self::assertSame('refresh_token', $accessTokenRequest->body['grant_type']);
        self::assertSame($refreshToken, $accessTokenRequest->body['refresh_token']);
        self::assertNotSame('client_credentials', $accessTokenRequest->body['grant_type']);

        self::assertSame('application/x-www-form-urlencoded', $accessTokenRequest->headers['Content-Type']);
        self::assertSame('Basic ' . self::ENV_MOCK_AUTHORIZATION_STRING, $accessTokenRequest->headers['Authorization']);
    }
}
