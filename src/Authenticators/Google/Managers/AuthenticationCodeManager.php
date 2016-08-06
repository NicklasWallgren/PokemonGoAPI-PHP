<?php

namespace NicklasW\PkmGoApi\Authenticators\Google\Managers;

use NicklasW\PkmGoApi\Authenticators\GoogleAuthenticator;
use NicklasW\PkmGoApi\Authenticators\Managers\AuthenticationManager;

class AuthenticationCodeManager extends AuthenticationManager {

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
     * @return string
     */
    public function getOauthToken()
    {
        // Retrieve the Google authenticator
        $authenticator = $this->authenticator();

        return $authenticator->loginByToken($this->authenticaionCode);
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
     * @return GoogleAuthenticator
     */
    protected function authenticator()
    {
        return new GoogleAuthenticator();
    }
}