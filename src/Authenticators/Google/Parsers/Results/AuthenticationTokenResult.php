<?php


namespace NicklasW\PkmGoApi\Authenticators\Google\Parsers\Results;

class AuthenticationTokenResult {

    /**
     * @var The parsed data
     */
    protected $data;

    /**
     * Result constructor.
     *
     * @param $data
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * @return The parsed data
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param The parsed data $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

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

}