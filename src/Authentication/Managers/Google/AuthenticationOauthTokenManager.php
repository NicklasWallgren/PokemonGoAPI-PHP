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
     * @param $config
     */
    public function __construct($config)
    {
        parent::__construct($config);

        if ($config->getOauthToken() instanceof AccessToken) {
            $this->setAccessToken($config);
        } else {
            $this->token = $config->getOauthToken();
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