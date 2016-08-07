<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google;

use NicklasW\PkmGoApi\Authentication\Contracts\Manager;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCode\Authenticator;

class AuthenticationCodeManager implements Manager {

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
        // Retrieve the Google authenticator
        $authenticator = $this->authenticator();

        return $authenticator->loginByToken($this->authenticationCode);
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