<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google;

use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCode\Authenticator;

class AuthenticationCodeManager extends Manager {

    /**
     * @var string The authentication code
     */
    protected $authenticationCode;

    /**
     * AuthenticationCodeManager constructor.
     *
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);

        $this->authenticationCode = $config->getAuthToken();
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

        // Retrieve the access token by authentication code
        $accessToken = $authenticator->loginByToken($this->authenticationCode);
        
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