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
     * @param AccessToken|string $token
     */
    public function __construct($token)
    {
        if ($token instanceof AccessToken) {
            $this->setAccessToken($token);
        } else {
            $this->token = $token;
        }
    }

    /**
     * Returns the Oauth token.
     *
     * @return AccessToken
     */
    public function getAccessToken()
    {
        if (!$this->accessToken) {
            $this->accessToken = new AccessToken($this->token, AccessToken::PROVIDER_GOOGLE);
        }

        // Dispatch event to listeners
        $this->dispatchEvent(static::EVENT_ACCESS_TOKEN, $this->accessToken);

        return $this->accessToken;
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