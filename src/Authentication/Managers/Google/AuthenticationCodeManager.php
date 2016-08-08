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
     * @param string $authenticationCode
     */
    public function __construct($authenticationCode)
    {
        $this->authenticationCode = $authenticationCode;
    }

    /**
     * Returns the Oauth token.
     *
     * @return AccessToken
     */
    public function getAccessToken()
    {

        // Check if the access token is available
        if ($this->accessToken !== null) {
            // Check if the timestamp is defined and valid
            if ($this->accessToken->isTimestampValid()) {
                return $this->accessToken->getToken();
            }

            // Check if a refresh token is defined
            if ($this->accessToken->hasFreshToken()) {
                // Use refresh token to retrieve new oauth token
            }
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