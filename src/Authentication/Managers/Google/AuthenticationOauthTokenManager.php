<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Manager;

class AuthenticationOauthTokenManager extends Manager {

    /**
     * @var
     */
    protected $token;

    /**
     * AuthenticationOauthTokenManager constructor.
     *
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Returns the Oauth token.
     *
     * @return AccessToken
     */
    public function getAccessToken()
    {
        $accessToken = new AccessToken($this->token, AccessToken::PROVIDER_GOOGLE);

        // Dispatch event to listeners
        $this->dispatchEvent(static::EVENT_ACCESS_TOKEN, $accessToken);

        // Add the access token to the manager
        $this->setAccessToken($accessToken);

        return $accessToken;
    }

    /**
     * Returns the identifier.
     *
     * @return string
     */
    public function getIdentifier()
    {
        return 'google';
    }

}