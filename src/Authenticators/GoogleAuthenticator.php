<?php

namespace NicklasW\PkmGoApi\Authenticators;

use NicklasW\PkmGoApi\Authenticators\Contracts\Authenticator;
use NicklasW\PkmGoApi\Authenticators\Google\Clients\AuthenticationClient;
use NicklasW\PkmGoApi\Authenticators\Google\Parsers\Results\AuthenticationTokenResult;
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
        $tokenResult = $this->getAuthenticationToken($email, $password);

        Log::debug(sprintf('[#%s] Token: \'%s\'', __CLASS__, $tokenResult->getToken()));

        // Retrieve the oauth token
        $oauthToken = $this->getOauthTokenByUserCredentials($email, $tokenResult->getToken());

        Log::debug(sprintf('[#%s] OAuth token: \'%s\'', __CLASS__, $oauthToken->getAuthId()));

        return $oauthToken->getAuthId();
    }

    /**
     * Authenticate using authentication code.
     *
     * @param string $token
     * @return string
     */
    public function loginByToken($token)
    {
        // Retrieve the authentication token result
        $tokenResult = $this->getOauthTokenByAuthenticationCode($token);

        // Retrieve the oauth token
        $oauthToken = $this->getOauthTokenByUserCredentials($tokenResult);

        Log::debug(sprintf('[#%s] OAuth token: \'%s\'', __CLASS__, $oauthToken->getAuthId()));


        

        return "";
    }

    /**
     * Authenticate using refresh token.
     *
     * @param string $token
     */
    public function loginByRefreshToken($token)
    {

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
    protected function getAuthenticationToken($email, $password)
    {
        return $this->client()->getAuthenticationToken($email, $password);
    }

    /**
     * Returns the oauth token by user credentials.
     *
     * @param string $email
     * @param string $token
     * @return AuthenticationTokenResult
     */
    protected function getOauthTokenByUserCredentials($email, $token)
    {
        return $this->client()->getOauthTokenByUserCredentials($email, $token);
    }

    /**
     * Returns the oauth token by authentication code.
     *
     * @param string $authenticationCode
     * @return AuthenticationTokenResult
     */
    protected function getOauthTokenByAuthenticationCode($authenticationCode)
    {
        return $this->client()->getOauthTokenByAuthenticationCode($authenticationCode);
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