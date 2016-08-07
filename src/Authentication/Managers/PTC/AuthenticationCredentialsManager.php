<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\PTC;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Contracts\Manager;
use NicklasW\PkmGoApi\Authenticators\PTCAuthenticator;

class AuthenticationCredentialsManager implements Manager {

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

        return $authenticator->login($this->username, $this->password);
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
     * @return PTCAuthenticator
     */
    protected function authenticator()
    {
        return new PTCAuthenticator();
    }
}