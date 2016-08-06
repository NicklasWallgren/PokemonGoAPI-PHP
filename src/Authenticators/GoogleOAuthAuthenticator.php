<?php

/**
 * @author DrDelay <info@vi0lation.de>
 */

namespace NicklasW\PkmGoApi\Authenticators;

use NicklasW\PkmGoApi\Authenticators\Contracts\Authenticator;
use NicklasW\PkmGoApi\Authenticators\GoogleAuthCode\Clients\AuthenticationClient;
use NicklasW\PkmGoApi\Facades\Log;

class GoogleOAuthAuthenticator implements Authenticator
{
    /**
     * @var AuthenticationClient|null
     */
    protected $authenticationClient;

    public function login($identifier, $authorization_code)
    {
        $oauthToken = null;

        $cacheHit = false; // TODO: Add caching of refresh token
        if ($cacheHit) {
            $oauthToken = $this->getOauthToken('refresh_token from cache'); // TODO
        } else {
            $oauthToken = $this->exchangeAuthCode($authorization_code);
            $refreshToken = $oauthToken->getRefreshToken(); // TODO: Save to cache
            Log::debug(sprintf('[#%s] Refresh_token: \'%s\'', __CLASS__, $refreshToken));
        }

        $idToken = $oauthToken->getIdToken();

        Log::debug(sprintf('[#%s] OAuth token: \'%s\'', __CLASS__, $idToken));

        return $idToken;
    }

    public function identifier()
    {
        return 'google';
    }

    /**
     * Retrieve the oauth token and refresh_token by auth-code.
     *
     * @param string $authorization_code
     *
     * @return \NicklasW\PkmGoApi\Authenticators\GoogleAuthCode\Parsers\Results\GoogleOAuthResult
     */
    public function exchangeAuthCode($authorization_code)
    {
        return $this->client()->exchangeAuthCode($authorization_code);
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
        return $this->client()->getOauthToken($refreshToken);
    }

    /**
     * Returns the Authentication client.
     *
     * @return AuthenticationClient
     */
    protected function client()
    {
        if (!$this->authenticationClient) {
            $this->authenticationClient = new AuthenticationClient();
        }

        return $this->authenticationClient;
    }
}
