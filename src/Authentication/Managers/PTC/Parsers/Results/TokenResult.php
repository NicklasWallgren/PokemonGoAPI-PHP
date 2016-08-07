<?php


namespace NicklasW\PkmGoApi\Authentication\Managers\PTC\Parsers\Results;

class TokenResult extends Result {

    /**
     * Returns the token.
     *
     * @return mixed
     */
    public function getToken()
    {
        return $this->data['token'];
    }

    /**
     * Returns the timestamp.
     *
     * @return string
     */
    public function getTimestamp()
    {
        return $this->data['timestamp'];
    }

}