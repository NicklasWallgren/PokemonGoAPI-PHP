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
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);

        $this->token = $config->getRefreshToken();
    }

    /**
     * Returns the Oauth token.
     *
     * @return AccessToken
     */
    public function getAccessToken()
    {
        // Check if we are authenticated
        if ($this->isAuthenticated()) {
            // Try to refresh the token if required and possible
            return $this->refreshTokenIfPossible();
        }

        // Retrieve the Google authenticator
        $authenticator = $this->authenticator();

        // Retrieve the access token by refresh token
        $accessToken = $authenticator->loginByRefreshToken($this->token);

        // Add the refresh token to the access token
        $accessToken->setRefreshToken($this->token);

        // Dispatch event to listeners
        $this->dispatchEvent(static::EVENT_ACCESS_TOKEN, $accessToken);

        // Add the access token to the manager
        $this->setAccessToken($accessToken);

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