<?php

namespace NicklasW\PkmGoApi\Authenticators\Managers;

abstract class AuthenticationManager {

    /**
     * Returns the Oauth token.
     *
     * @return string
     */
    abstract public function getOauthToken();

    /**
     * Returns the identifier.
     *
     * @return string
     */
    abstract public function getIdentifier();

}