<?php

namespace NicklasW\PkmGoApi\Authenticators\PTC\Managers;

use NicklasW\PkmGoApi\Authenticators\Managers\AuthenticationManager;
use NicklasW\PkmGoApi\Authenticators\PTCAuthenticator;

class AuthenticationCredentialsManager extends AuthenticationManager {

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
     * @return string
     */
    public function getOauthToken()
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