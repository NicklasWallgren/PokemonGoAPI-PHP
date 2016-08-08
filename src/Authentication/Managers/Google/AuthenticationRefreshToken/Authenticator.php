<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationRefreshToken;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationRefreshToken\Clients\AuthenticationClient;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationRefreshToken\Parsers\Results\AuthenticationTokenResult;

class Authenticator {

    /**
     * @var Authenticator
     */
    protected $authenticationClient;

    /**
     * Authenticate using refresh code.
     *
     * @param string $token
     * @return string
     */
    public function loginByRefreshToken($token)
    {
        // Retrieve Oauth token by refresh code
        $result = $this->getOauthTokenByAuthenticationRefreshToken($token);

        return new AccessToken($result->getToken(), AccessToken::PROVIDER_GOOGLE, $result->getExpiryTimestamp());
    }

    /**
     * Returns the authentication identifier.
     *
     * @return string
     */
    public function identifier()
    {
        return 'google';
    }

    /**
     * Returns the oauth token by refresh code.
     *
     * @param string $AuthenticationRefreshToken
     * @return AuthenticationTokenResult
     */
    protected function getOauthTokenByAuthenticationRefreshToken($AuthenticationRefreshToken)
    {
        return $this->client()->getOauthTokenByAuthenticationRefreshToken($AuthenticationRefreshToken);
    }

    /**
     * Returns the Authentication client
     *
     * @return AuthenticationClient
     */
    protected function client()
    {
        // Check if the authentication client is initialized
        if ($this->authenticationClient == null) {
            $this->authenticationClient = new AuthenticationClient();
        }

        return $this->authenticationClient;
    }
}