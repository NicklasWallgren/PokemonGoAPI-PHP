<?php

namespace NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCode\Parsers\Results;

class AuthenticationTokenResult extends Result {

    /**
     * Returns the token.
     *
     * @return string
     */
    public function getToken()
    {
        return $this->data['token'];
    }

    /**
     * Returns the refresh token.
     *
     * @return string
     */
    public function getRefreshToken()
    {
        return $this->data['refresh_token'];
    }

    /**
     * Returns the expiry timestamp.
     *
     * @return string
     */
    public function getExpiryTimestamp()
    {
        return $this->data['timestamp'];
    }

}