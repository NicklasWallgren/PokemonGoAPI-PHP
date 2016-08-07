<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationRefreshToken\Authenticator;

class AuthenticationRefreshTokenManager extends Manager {

    /**
     * @var
     */
    protected $token;

    /**
     * AuthenticationOauthTokenManager constructor.
     *
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Returns the Oauth token.
     *
     * @return AccessToken
     */
    public function getAccessToken()
    {
        // Retrieve the Google authenticator
        $authenticator = $this->authenticator();

        // Retrieve the access token by refresh token
        $accessToken = $authenticator->loginByRefreshToken($this->token);

        // Dispatch event to listeners
        $this->dispatchEvent(static::EVENT_ACCESS_TOKEN, $accessToken);

        return $accessToken;
    }

    /**
     * Returns the identifier.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return $this->authenticator()->identifier();
    }

    /**
     * Returns the authenticator.
     *
     * @return Authenticator
     */
    protected function authenticator()
    {
        return new Authenticator();
    }

}