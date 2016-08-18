<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCredentials\Authenticator;

class AuthenticationCredentialsManager extends Manager {

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * AuthenticationCredentialsManager constructor.
     *
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);

        $this->email    = $config->getUser();
        $this->password = $config->getPassword();
    }

    /**
     * Returns the Oauth token.
     *
     * @return AccessToken
     */
    public function getAccessToken()
    {
        // Check if we are authenticated
        if ($this->isAuthenticated() && ($token = $this->refreshTokenIfPossible())) {
            return $token;
        }

        // Retrieve the Google authenticator
        $authenticator = $this->authenticator();

        // Retrieve the access token by user credentials
        $accessToken = $authenticator->login($this->email, $this->password);

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
     * Refresh the token if possible.
     *
     * @return AccessToken|null
     * @throws AuthenticationException
     */
    protected function refreshTokenIfPossible()
    {
        // Check if the oauth token is valid
        if ($this->isTokenValid()) {
            return $this->accessToken;
        }

        // Check if a refresh token is defined
        if ($this->hasFreshToken()) {
            // Use refresh token to retrieve new oauth token

            // Dispatch event to listeners
            $this->dispatchEvent(static::EVENT_ACCESS_TOKEN, $this->accessToken);

            return $this->accessToken;
        }

        return null;
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