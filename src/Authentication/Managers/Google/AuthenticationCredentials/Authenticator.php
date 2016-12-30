<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCredentials;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCredentials\Clients\AuthenticationClient;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCredentials\Parsers\Results\AuthenticationTokenResult;
use NicklasW\PkmGoApi\Facades\Log;

class Authenticator {

    /**
     * @var Authenticator
     */
    protected $authenticationClient;

    /**
     * Authenticate using email and password.
     *
     * @param string $email
     * @param string $password
     * @return AccessToken The access token
     */
    public function login($email, $password)
    {
        // Retrieve the authentication token result
        $tokenResult = $this->getAuthenticationToken($email, $password);

        Log::debug(sprintf('[#%s] Token: \'%s\'', __CLASS__, $tokenResult->getToken()));

        // Retrieve the oauth token
        $result = $this->getOauthTokenByUserCredentials($email, $tokenResult->getToken());

        Log::debug(sprintf('[#%s] OAuth token: \'%s\'', __CLASS__, $result->getToken()));

        return new AccessToken($result->getToken(), AccessToken::PROVIDER_GOOGLE, $result->getExpiryTimestamp());
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