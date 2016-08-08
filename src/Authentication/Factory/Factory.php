<?php

namespace NicklasW\PkmGoApi\Authentication\Factory;

use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCodeManager as GoogleAuthenticationCodeManager;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationOauthTokenManager as GoogleAuthenticationOauthTokenManager;

class Factory {

    /**
     * Create authentication manager.
     *
     * @param Config $config
     */
    public static function create($config)
    {

    }

    /**
     * @param Config $config
     */
    protected function createAuthenticationManager($config)
    {

        
        if ($this->isAdaptedForGoogleAuthenticationCodeManager($config)) {

        }

        if ($this->isAdaptedForGoogleOauthToken($config)) {

        }

        if ($this->isAdaptedForGoogleUserCredentialsManager($config)) {

        }

    }

    /**
     * Returns true if the config is adapted for google authentication code manager, false otherwise.
     *
     * @param Config $config
     * @return boolean
     */
    protected function isAdaptedForGoogleAuthenticationCodeManager($config)
    {
        return $config->getAuthToken() !== null;
    }

    /**
     * Returns true if the config is adapted for google user credentials manager, false otherwise.
     *
     * @param Config $config
     * @return boolean
     */
    protected function isAdaptedForGoogleUserCredentialsManager($config)
    {
        return $config->getUser() !== null && $config->getPassword() !== null;
    }

    /**
     * Returns true if the config is adapted for google Oauth token manager, false otherwise.
     *
     * @param Config $config
     * @return boolean
     */
    protected function isAdaptedForGoogleOauthToken($config)
    {
        return $config->getOauthToken() !== null;
    }

    /**
     * Create Google authentication code manager.
     *
     * @param Config $config
     * @return GoogleAuthenticationCodeManager
     */
    protected function createGoogleAuthenticationCodeManager($config)
    {
        return new GoogleAuthenticationCodeManager($config->getAuthToken());
    }

    /**
     * Create Google oauth manager.
     *
     * @param Config $config
     * @return GoogleAuthenticationOauthTokenManager
     */
    protected function createGoogleOauthManager($config)
    {
        return new GoogleAuthenticationOauthTokenManager($config->getOauthToken());
    }

    /**
     * Create Google authentication code manager.
     *
     * @param Config $config
     * @return GoogleAuthenticationCodeManager
     */
    protected function createGoogleUserCredentialsManager($config)
    {
        return new GoogleAuthenticationCodeManager($config->getAuthToken());
    }

}