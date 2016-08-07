<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\PTC;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials\Authenticator;
use NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials\PTCAuthenticator;

class AuthenticationCredentialsManager extends Manager {

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $username;

    /**
     * AuthenticationCodeManager constructor.
     *
     * @param string $username
     * @param string $password
     */
    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $password;
    }

    /**
     * Returns the Oauth token.
     *
     * @return AccessToken
     */
    public function getAccessToken()
    {
        // Retrieve the PTC authenticator
        $authenticator = $this->authenticator();

        // Retrieve the access token by user credentials
        $accessToken = $authenticator->login($this->username, $this->password);

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