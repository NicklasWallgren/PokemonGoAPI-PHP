<?php

/**
 * @author DrDelay <info@vi0lation.de>
 */

namespace NicklasW\PkmGoApi\Authentication\Managers\PTC;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;
use NicklasW\PkmGoApi\Authentication\Manager;

class AuthenticationOauthTokenManager extends Manager
{
    /** @var string */
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

    public function getAccessToken()
    {
        $accessToken = new AccessToken($this->token, AccessToken::PROVIDER_PTC);

        $this->dispatchEvent(static::EVENT_ACCESS_TOKEN, $accessToken);

        $this->setAccessToken($accessToken);

        return $accessToken;
    }

    public function getIdentifier()
    {
        return Factory::PROVIDER_PTC;
    }
}
