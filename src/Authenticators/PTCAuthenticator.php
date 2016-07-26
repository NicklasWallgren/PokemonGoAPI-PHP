<?php

namespace NicklasW\PkmGoApi\Authenticators;

use NicklasW\PkmGoApi\Authenticators\Contracts\Authenticator;
use NicklasW\PkmGoApi\Authenticators\PTC\Clients\AuthenticationClient;

class PTCAuthenticator implements Authenticator {

    /**
     * @var AuthenticationClient
     */
    protected $authenticationClient;

    /**
     * Authenticate using email and password.
     *
     * @param string $username
     * @param string $password
     * @return string The authentication token
     */
    public function login($username, $password)
    {
        // Retrieve the authentication information
        $authenticationInformation = $this->client()->authenticationInformation();

        // Retrieve the authentication ticket
        $ticketInformation = $this->client()->ticket($username, $password, $authenticationInformation);

        // Retrieve the authentication token
        $tokenInformation = $this->client()->token($ticketInformation->getTicket());

        return $tokenInformation->getToken();
    }

    /**
     * Returns the authentication identifier.
     *
     * @return string
     */
    public function identifier()
    {
        return 'ptc';
    }

    /**
     * Returns the Authentication client
     *
     * @return AuthenticationClient
     */
    protected function client()
    {
        // Check if the authentication client is initialized
        if ($this->authenticationClient == null) {
            $this->authenticationClient = new AuthenticationClient();
        }

        return $this->authenticationClient;
    }


}