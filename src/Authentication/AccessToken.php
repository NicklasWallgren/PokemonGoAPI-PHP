<?php

namespace NicklasW\PkmGoApi\Authentication;

class AccessToken {

    /**
     * @var string
     */
    const PROVIDER_GOOGLE = 'google';

    /**
     * @var string
     */
    const PROVIDER_PTC = 'ptc';

    /**
     * @var string The Oauth token
     */
    protected $token;

    /**
     * @var integer The lifetime timestamp of the token
     */
    protected $timestamp;

    /**
     * @var string The refresh token
     */
    protected $refreshToken;

    /**
     * @var string The token provider
     */
    protected $provider;

    /**
     * AccessToken constructor.
     *
     * @param string  $token The Oauth token
     * @param string  $provider The provider, either google or ptc
     * @param integer $timestamp The timestamp of the Oauth token
     * @param string  $refreshToken The refresh token
     */
    public function __construct($token, $provider, $timestamp = null, $refreshToken = null)
    {
        $this->token = $token;
        $this->provider = $provider;
        $this->timestamp = $timestamp;
        $this->refreshToken = $refreshToken;
    }

    /**
     * @return string
     */
    public function getToken()
    {
        return $this->token;
    }

    /**
     * @param string $token
     */
    public function setToken($token)
    {
        $this->token = $token;
    }

    /**
     * @return int
     */
    public function getTimestamp()
    {
        return $this->timestamp;
    }

    /**
     * @param int $timestamp
     */
    public function setTimestamp($timestamp)
    {
        $this->timestamp = $timestamp;
    }

    /**
     * Returns true if the timestamp is defined, false otherwise.
     *
     * @return boolean
     */
    public function hasTimestamp()
    {
        return $this->timestamp !== null;
    }

    /**
     * Returns true if the timestamp is valid, false otherwise.
     *
     * @return boolean
     */
    public function isTimestampValid()
    {
        return $this->hasTimestamp() && intval($this->timestamp) > time();
    }

    /**
     * Returns true if the access token is valid, false otherwise.
     *
     * @return boolean
     */
    public function isValid()
    {
        // Check if we have a oauth token, but no token lifetime timestamp
        if ($this->getToken() && !$this->hasTimestamp()) {
            // Authenticated using oauth token, we can't validate the state of the access token.
            return true;
        }

        // Check if we have a oauth token, a token lifetime timestamp and no fresh token
        if ($this->getToken() && $this->hasTimestamp() && !$this->hasFreshToken()) {
            // Authenticated using user credentials. We have no refresh token.
            return $this->isTimestampValid();
        }

        // Check if we have a fresh token and a token lifetime timestamp
        if ($this->hasFreshToken() && $this->hasTimestamp()) {
            // Authenticated using authentication code, or refresh token.
            return $this->isTimestampValid();
        }
    }

    /**
     * @return mixed
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param mixed $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * @return boolean
     */
    public function hasFreshToken()
    {
        return $this->refreshToken !== null;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

}