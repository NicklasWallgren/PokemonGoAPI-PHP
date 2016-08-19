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
    /**
     * AuthenticationOauthTokenManager constructor.
     *
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);

        $this->setAccessToken($config);
    }

    public function getAccessToken()
    {
        $this->dispatchEvent(static::EVENT_ACCESS_TOKEN, $this->accessToken);

        return $this->accessToken;
    }

    public function getIdentifier()
    {
        return Factory::PROVIDER_PTC;
    }
}
