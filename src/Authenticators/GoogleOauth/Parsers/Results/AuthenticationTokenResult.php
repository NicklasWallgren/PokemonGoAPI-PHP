<?php


namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results;

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
     * Returns the id token.
     *
     * @return mixed
     */
    public function getIdToken()
    {
        return $this->data->id_token;
    }

}