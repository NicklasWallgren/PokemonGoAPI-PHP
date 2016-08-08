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
        return $this->hasTimestamp() && intval($this->timestamp) > microtime();
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