<?php

namespace NicklasW\PkmGoApi\Authenticators\Google\Managers;

use NicklasW\PkmGoApi\Authenticators\GoogleAuthenticator;
use NicklasW\PkmGoApi\Authenticators\Managers\AuthenticationManager;

class AuthenticationCredentialsManager extends AuthenticationManager {

    /**
     * @var string
     */
    protected $email;

    /**
     * @var string
     */
    protected $password;

    /**
     * AuthenticationCodeManager constructor.
     *
     * @param string $email
     * @param string $password
     */
    public function __construct($email, $password)
    {
        $this->email = $email;
        $this->password = $password;
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

        return $authenticator->login($this->email, $this->password);
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