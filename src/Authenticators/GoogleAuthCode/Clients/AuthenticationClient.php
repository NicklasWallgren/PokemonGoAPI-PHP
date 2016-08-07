<?php

/**
 * @author DrDelay <info@vi0lation.de>
 */

namespace NicklasW\PkmGoApi\Authenticators\GoogleAuthCode\Clients;

use NicklasW\PkmGoApi\Authenticators\GoogleAuthCode\Parsers\GoogleOAuthParser;
use NicklasW\PkmGoApi\Clients\Client;

class AuthenticationClient
{
    const GOOGLE_OAUTH_TOKEN_URL = 'https://www.googleapis.com/oauth2/v4/token';
    const GOOGLE_OAUTH_CLIENT_ID = '848232511240-73ri3t7plvk96pj4f85uj8otdat2alem.apps.googleusercontent.com';
    const GOOGLE_OAUTH_CLIENT_SECRET = 'NCjF1TLi2CcY6t5mt0ZveuL7';
    const SCOPE = 'openid email https://www.googleapis.com/auth/userinfo.email';
    const REDIRECT = 'urn:ietf:wg:oauth:2.0:oob';

    /**
     * @var Client|null
     */
    protected $client;

    /**
     * Retrieve the oauth token and refresh_token by auth-code.
     *
     * @param string $authorization_code
     *
     * @return \NicklasW\PkmGoApi\Authenticators\GoogleAuthCode\Parsers\Results\GoogleOAuthResult
     */
    public function exchangeAuthCode($authorization_code)
    {
        return GoogleOAuthParser::parse($this->client()->post(static::GOOGLE_OAUTH_TOKEN_URL, ['form_params' => [
            'code' => $authorization_code,
            'client_id' => static::GOOGLE_OAUTH_CLIENT_ID,
            'client_secret' => static::GOOGLE_OAUTH_CLIENT_SECRET,
            'grant_type' => 'authorization_code',
            'redirect_uri' => static::REDIRECT,
        ]]));
    }

    /**
     * Retrieve the oauth token by refresh_token.
     *
     * @param string $refreshToken
     *
     * @return \NicklasW\PkmGoApi\Authenticators\GoogleAuthCode\Parsers\Results\GoogleOAuthResult
     */
    public function getOauthToken($refreshToken)
    {
        return GoogleOAuthParser::parse($this->client()->post(static::GOOGLE_OAUTH_TOKEN_URL, ['form_params' => [
            'access_type' => 'offline',
            'client_id' => static::GOOGLE_OAUTH_CLIENT_ID,
            'client_secret' => static::GOOGLE_OAUTH_CLIENT_SECRET,
            'refresh_token' => $refreshToken,
            'grant_type' => 'refresh_token',
            'scope' => static::SCOPE,
        ]]));
    }

    /**
     * Returns the Client.
     *
     * @return Client
     */
    protected function client()
    {
        if (!$this->client) {
            $this->client = new Client(['cookies' => true]);
        }

        return $this->client;
    }
}
