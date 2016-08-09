<?php

namespace NicklasW\PkmGoApi\Authentication\Factory;

use Exception;
use NicklasW\PkmGoApi\Authentication\AccessToken;
use NicklasW\PkmGoApi\Authentication\Config\Config;
use NicklasW\PkmGoApi\Authentication\Exceptions\AuthenticationException;
use NicklasW\PkmGoApi\Authentication\Manager;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCodeManager as GoogleAuthenticationCodeManager;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCredentialsManager as GoogleAuthenticationCredentialsManager;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationOauthTokenManager as GoogleAuthenticationOauthTokenManager;
use NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationRefreshTokenManager as GoogleAuthenticationRefreshTokenManager;
use NicklasW\PkmGoApi\Authentication\Managers\PTC\AuthenticationCredentialsManager as PTCAuthenticationCredentialsManager;

class Factory {

    /**
     * @var string
     */
    const PROVIDER_GOOGLE = 'google';

    /**
     * @var string
     */
    const PROVIDER_PTC = 'ptc';

    /**
     * Create authentication manager.
     *
     * @param Config|AccessToken $config
     * @return Manager
     */
    public static function create($config)
    {
        if (self::isAccessConfig($config)) {
            return self::createAuthenticationManagerByAccessToken($config);
        }

        return self::createAuthenticationManager($config);
    }

    /**
     * @param Config $config
     * @return Manager
     * @throws Exception
     */
    protected static function createAuthenticationManager($config)
    {
        if ($config->isGoogle()) {
            return self::createGoogleManager($config);
        } elseif ($config->isPTC()) {
            return self::createPTCManager($config);
        }

        throw new Exception('Invalid config provided. No provider defined');
    }

    /**
     * Create authentication manager.
     *
     * @param AccessToken $accessToken
     * @return GoogleAuthenticationOauthTokenManager|GoogleAuthenticationRefreshTokenManager
     * @throws AuthenticationException
     */
    protected static function createAuthenticationManagerByAccessToken($accessToken)
    {
        // Check if a token timestamp is provided
        if (!$accessToken->hasTimestamp()) {
            return new GoogleAuthenticationOauthTokenManager($accessToken->getToken());
        }

        // Check if a fresh token is available, check if it is still valid
        if ($accessToken->hasFreshToken() && $accessToken->isTimestampValid()) {
            return new GoogleAuthenticationRefreshTokenManager($accessToken->getRefreshToken());
        }

        if ($accessToken->isTimestampValid()) {
            return new GoogleAuthenticationOauthTokenManager($accessToken->getToken());
        }

        throw new AuthenticationException('Please re-login, the access token has expired');
    }

    /**
     * Create Google authentication manager.
     *
     * @param Config $config
     * @return GoogleAuthenticationCodeManager|GoogleAuthenticationCredentialsManager|GoogleAuthenticationOauthTokenManager
     * @throws AuthenticationException
     */
    protected static function createGoogleManager($config)
    {
        if (self::isAdaptedForGoogleRefreshTokenManager($config)) {
            return self::createGoogleRefreshTokenManager($config);
        }

        if (self::isAdaptedForGoogleOauthToken($config)) {
            return self::createGoogleOauthManager($config);
        }

        if (self::isAdaptedForGoogleAuthenticationCodeManager($config)) {
            return self::createGoogleAuthenticationCodeManager($config);
        }

        if (self::isAdaptedForUserCredentialsManager($config)) {
            return self::createGoogleUserCredentialsManager($config);
        }

        throw new AuthenticationException('Invalid config provided. Could not create authentication manager');

    }

    /**
     * Create PTC authentication manager.
     *
     * @param Config $config
     * @return PTCAuthenticationCredentialsManager
     * @throws AuthenticationException
     */
    protected static function createPTCManager($config)
    {
        if (self::isAdaptedForUserCredentialsManager($config)) {
            return new PTCAuthenticationCredentialsManager($config->getUser(), $config->getPassword());
        }

        throw new AuthenticationException('Invalid config provided. Could not create authentication manager');
    }

    /**
     * Return true if config is of type access token, false otherwise.
     *
     * @param Config|AccessToken $config
     * @return boolean
     */
    protected static function isAccessConfig($config)
    {
        return $config instanceof AccessToken;
    }

    /**
     * Returns true if the config is adapted for google authentication code manager, false otherwise.
     *
     * @param Config $config
     * @return boolean
     */
    protected static function isAdaptedForGoogleAuthenticationCodeManager($config)
    {
        return $config->getAuthToken() !== null;
    }

    /**
     * Returns true if the config is adapted for google user credentials manager, false otherwise.
     *
     * @param Config $config
     * @return boolean
     */
    protected static function isAdaptedForUserCredentialsManager($config)
    {
        return $config->getUser() !== null && $config->getPassword() !== null;
    }

    /**
     * Returns true if the config is adapted for google Oauth token manager, false otherwise.
     *
     * @param Config $config
     * @return boolean
     */
    protected static function isAdaptedForGoogleOauthToken($config)
    {
        return $config->getOauthToken() !== null;
    }

    /**
     * Returns true if the config is adapted for google refresh token manager, false otherwise.
     *
     * @param Config $config
     * @return boolean
     */
    protected static function isAdaptedForGoogleRefreshTokenManager($config)
    {
        return $config->getRefreshToken() !== null;
    }

    /**
     * Create Google refresh token manager.
     *
     * @param Config $config
     * @return GoogleAuthenticationCodeManager
     */
    protected static function createGoogleRefreshTokenManager($config)
    {
        return new GoogleAuthenticationRefreshTokenManager($config->getRefreshToken());
    }

    /**
     * Create Google oauth manager.
     *
     * @param Config $config
     * @return GoogleAuthenticationOauthTokenManager
     */
    protected static function createGoogleOauthManager($config)
    {
        return new GoogleAuthenticationOauthTokenManager($config->getOauthToken());
    }

    /**
     * Create Google user credentials manager.
     *
     * @param Config $config
     * @return GoogleAuthenticationCodeManager
     */
    protected static function createGoogleAuthenticationCodeManager($config)
    {
        return new GoogleAuthenticationCodeManager($config->getAuthToken());
    }

    /**
     * Create Google user credentials manager.
     *
     * @param Config $config
     * @return GoogleAuthenticationCredentialsManager
     */
    protected static function createGoogleUserCredentialsManager($config)
    {
        return new GoogleAuthenticationCredentialsManager($config->getUser(), $config->getPassword());
    }

}