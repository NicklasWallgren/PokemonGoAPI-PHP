<?php


namespace NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCredentials\Parsers\Results;

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
     * Returns the auth id.
     *
     * @return string
     */
    public function getAuthId()
    {
        return $this->data['auth'];
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