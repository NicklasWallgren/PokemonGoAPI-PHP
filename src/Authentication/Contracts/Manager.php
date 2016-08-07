<?php

namespace NicklasW\PkmGoApi\Authentication\Contracts;

use NicklasW\PkmGoApi\Authentication\AccessToken;

interface Manager {

    /**
     * Returns the Oauth token.
     *
     * @return AccessToken
     */
    public function getAccessToken();

    /**
     * Returns the identifier.
     *
     * @return string
     */
    public function getIdentifier();

}