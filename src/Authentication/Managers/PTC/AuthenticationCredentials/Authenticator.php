<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Contracts\Authentication;
use NicklasW\PkmGoApi\Authentication\Contracts\Authenticator as AuthenticatorContract;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentials\Clients\AuthenticationClient;
use NicklasW\PkmGoApi\Facades\Log;

class Authenticator implements AuthenticatorContract {

    /**
     * @var AuthenticationClient
     */
    protected $authenticationClient;

    /**
     *
     */
    public function authenticate($username, $password)
    {


    }

    /**
     * Authenticate using email and password.
     *
     * @param string $username
     * @param string $password
     * @return AccessToken The access token
     */
    public function login($username, $password)
    {
        // Retrieve the authentication information
        $authenticationInformation = $this->client()->authenticationInformation();

        // Retrieve the authentication ticket
        $ticketInformation = $this->client()->ticket($username, $password, $authenticationInformation);

        Log::debug(sprintf('[#%s] Retrieved ticket: \'%s\'', __CLASS__, $ticketInformation->getTicket()));

        // Retrieve the authentication token
        $tokenInformation = $this->client()->token($ticketInformation->getTicket());

        Log::debug(sprintf('[#%s] Retrieved token: \'%s\'', __CLASS__, $tokenInformation->getToken()));

        return new AccessToken($tokenInformation->getToken());
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