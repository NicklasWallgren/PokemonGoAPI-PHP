<?php

namespace NicklasW\PkmGoApi\Authentication\Config;

use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Factory\Factory;

class Config {

    /**
     * @var string
     */
    protected $user;

    /**
     * @var string
     */
    protected $password;

    /**
     * @var string
     */
    protected $authToken;

    /**
     * @var string
     */
    protected $refreshToken;

    /**
     * @var string
     */
    protected $oauthToken;

    /**
     * @var string
     */
    protected $provider;

    /**
     * @var string
     */
    protected $env_file_path;

    /**
     * Converts the access token to a config object.
     *
     * @param AccessToken $accessToken
     */
    public static function from($accessToken)
    {

        $instance = new static();



    }


    /**
     * @return string
     */
    public function getEnvFilePath()
    {

        // attempt to resolve environment file by looking up the parent directories
        // the default depth limit is 4
        if ($this->env_file_path === null) {

            $this->env_file_path = searchEnvFilePath();

        }

        return $this->env_file_path;
    }

    /**
     * @return string
     */
    public function setEnvFilePath($path)
    {
        $this->env_file_path = $path;
    }

    /**
     * @return string
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param string $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return string
     */
    public function getAuthToken()
    {
        return $this->authToken;
    }

    /**
     * @param string $authToken
     */
    public function setAuthToken($authToken)
    {
        $this->authToken = $authToken;
    }

    /**
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->refreshToken;
    }

    /**
     * @param string $refreshToken
     */
    public function setRefreshToken($refreshToken)
    {
        $this->refreshToken = $refreshToken;
    }

    /**
     * @return string
     */
    public function getOauthToken()
    {
        return $this->oauthToken;
    }

    /**
     * @param string $oauthToken
     */
    public function setOauthToken($oauthToken)
    {
        $this->oauthToken = $oauthToken;
    }

    /**
     * @return string
     */
    public function getProvider()
    {
        return $this->provider;
    }

    /**
     * @param string $provider
     */
    public function setProvider($provider)
    {
        $this->provider = $provider;
    }

    /**
     * @return boolean
     */
    public function isGoogle()
    {
        return $this->provider === Factory::PROVIDER_GOOGLE;
    }

    /**
     * @return boolean
     */
    public function isPTC()
    {
        return $this->provider === Factory::PROVIDER_PTC;
    }

}