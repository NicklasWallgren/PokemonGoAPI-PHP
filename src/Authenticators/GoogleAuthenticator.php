<?php

namespace NicklasW\PkmGoApi\Authenticators;

use NicklasW\PkmGoApi\Authenticators\Contracts\Authenticator;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Clients\AuthenticationClient;
use NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results\AuthenticationTokenResult;
use NicklasW\PkmGoApi\Facades\Log;

class GoogleAuthenticator implements Authenticator {

    /**
     * @var AuthenticationClient
     */
    protected $authenticationClient;

    /**
     * Authenticate using email and password.
     *
     * @param string $email
     * @param string $password
     * @return string The authentication token
     */
    public function login($email, $password)
    {
        // Retrieve the authentication token result
        $tokenResult = $this->getToken($email, $password);

        Log::debug(sprintf('[#%s] Token: \'%s\'', __CLASS__, $tokenResult->getToken()));

        // Retrieve the oauth token
        $oauthToken = $this->getOauthToken($email, $tokenResult->getToken());

        Log::debug(sprintf('[#%s] OAuth token: \'%s\'', __CLASS__, $oauthToken->getAuthId()));

        return $oauthToken->getAuthId();
    }

    /**
     * Returns the authentication identifier.
     *
     * @return string
     */
    public function identifier()
    {
        return 'google';
    }

    /**
     * Returns the authentication token.
     *
     * @param $email
     * @param $password
     * @return AuthenticationTokenResult
     */
    protected function getToken($email, $password)
    {
        return $this->client()->token($email, $password);
    }

    /**
     * Returns the oauth token.
     *
     * @param string $email
     * @param string $token
     * @return AuthenticationTokenResult
     */
    protected function getOauthToken($email, $token)
    {
        return $this->client()->oauthToken($email, $token);
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