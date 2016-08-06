<?php


namespace NicklasW\PkmGoApi\Authenticators;

use NicklasW\PkmGoApi\Authenticators\Contracts\Authenticator;
use NicklasW\PkmGoApi\Authenticators\Exceptions\IllegalAuthenticationTypeException;

class Factory {

    /**
     * @var The Google authentication type
     */
    const AUTHENTICATION_TYPE_GOOGLE = 1;

    /**
     * @var The PTC authentication type
     */
    const AUTHENTICATION_TYPE_PTC = '2';

    const AUTHENTICATION_TYPE_GOOGLE_OAUTH = 3;

    /**
     * Authenticator factory.
     *
     * @param $authenticationType
     * @return Authenticator|null
     * @throws IllegalAuthenticationTypeException
     */
    public function create($authenticationType)
    {
        $authenticator = null;

        switch ($authenticationType) {

            case self::AUTHENTICATION_TYPE_GOOGLE:
                $authenticator = $this->createGoogleAuthenticator();

                break;

            case self::AUTHENTICATION_TYPE_PTC:
                $authenticator = $this->createPTCAuthenticator();

                break;

            case self::AUTHENTICATION_TYPE_GOOGLE_OAUTH:
                $authenticator = $this->createGoogleOAuthAuthenticator();

                break;

            default:
                throw new IllegalAuthenticationTypeException();

                break;

        }

        return $authenticator;
    }

    /**
     * Creates Google Authenticator.
     *
     * @return GoogleAuthenticator
     */
    protected function createGoogleAuthenticator()
    {
        return new GoogleAuthenticator();
    }

    /**
     * Creates PTC Authenticator.
     *
     * @return GoogleAuthenticator
     */
    protected function createPTCAuthenticator()
    {
        return new PTCAuthenticator();
    }

    /**
     * Creates a GoogleOAuth Authenticator.
     *
     * @return GoogleOAuthAuthenticator
     */
    protected function createGoogleOAuthAuthenticator()
    {
        return new GoogleOAuthAuthenticator();
    }
}