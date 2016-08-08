<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCode;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCode\Clients\AuthenticationClient;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCode\Parsers\Results\AuthenticationTokenResult;

class Authenticator {

    /**
     * @var Authenticator
     */
    protected $authenticationClient;

    /**
     * Authenticate using authentication code.
     *
     * @param string $token
     * @return string
     */
    public function loginByToken($token)
    {
        // Retrieve Oauth token by authentication code
        $result = $this->getOauthTokenByAuthenticationCode($token);

        return new AccessToken($result->getToken(), AccessToken::PROVIDER_GOOGLE, $result->getExpiryTimestamp(), $result->getRefreshToken());
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
     * Returns the oauth token by authentication code.
     *
     * @param string $authenticationCode
     * @return AuthenticationTokenResult
     */
    protected function getOauthTokenByAuthenticationCode($authenticationCode)
    {
        return $this->client()->getOauthTokenByAuthenticationCode($authenticationCode);
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