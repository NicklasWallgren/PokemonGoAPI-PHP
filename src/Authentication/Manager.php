<?php

namespace NicklasW\PkmGoApi\Authentication;

use Closure;
use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Exceptions\AuthenticationException;

abstract class Manager {

    /**
     * @var integer The access token event
     */
    const EVENT_ACCESS_TOKEN = 0;

    /**
     * @var array
     */
    protected $listeners = array();

    /**
     * @var AccessToken The access token
     */
    protected $accessToken;

    /**
     * @var Config
     */
    protected $config;

    public function __construct($config)
    {
        $this->config = $config;
    }


    /**
     * Returns the Config Object
     *
     * @return Config
     */
    public function getConfig()
    {
        return $this->config;
    }


    /**
     * Returns the Oauth token.
     *
     * @return AccessToken
     */
    abstract public function getAccessToken();

    /**
     * Returns the identifier.
     *
     * @return string
     */
    abstract public function getIdentifier();

    /**
     * Adds a listener to the list of listeners
     *
     * @param Closure $listener
     */
    public function addListener(Closure $listener)
    {
        $this->listeners[] = $listener;
    }

    /**
     * Dispatch a event to the listeners
     *
     * @param int   $event
     * @param mixed $data
     */
    public function dispatchEvent($event, $data)
    {
        // Iterate through the list of listeners
        foreach ($this->listeners as $listener) {
            // Dispatch the event to the listener
            $listener($event, $data);
        }
    }

    /**
     * @param AccessToken $accessToken
     */
    public function setAccessToken($accessToken)
    {
        $this->accessToken = $accessToken;
    }

    /**
     * Refresh the token if possible.
     *
     * @return AccessToken
     * @throws AuthenticationException
     */
    protected function refreshTokenIfPossible()
    {
        // Check if the oauth token is valid
        if ($this->isTokenValid()) {
            return $this->accessToken;
        }

        // Check if a refresh token is defined
        if ($this->hasFreshToken()) {
            // Use refresh token to retrieve new oauth token

            // Dispatch event to listeners
            $this->dispatchEvent(static::EVENT_ACCESS_TOKEN, $this->accessToken);

            return $this->accessToken;
        }
        
        throw new AuthenticationException('Unable to refresh token, please re-login');
    }

    /**
     * Returns true if the manager has authenticated, false otherwise.
     *
     * @return boolean
     */
    protected function isAuthenticated()
    {
        return $this->accessToken !== null;
    }

    /**
     * Returns true if the token is valid, false otherwise.
     *
     * @return boolean
     */
    protected function isTokenValid()
    {
        // Check if the access token contains lifetime timestamp
        if ($this->isAuthenticated() && !$this->accessToken->hasTimestamp()) {
            return true;
        }

        return $this->isAuthenticated() && $this->accessToken->isTimestampValid();
    }

    /**
     * Return true if fresh token is defined and valid, false otherwise.
     *
     * @return bool
     */
    protected function hasFreshToken()
    {
        return $this->isAuthenticated() && $this->accessToken->isTimestampValid();
    }

}