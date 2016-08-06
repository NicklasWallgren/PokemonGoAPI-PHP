<?php


namespace NicklasW\PkmGoApi\Authenticators\GoogleOauth\Parsers\Results;

class AuthenticationInformationResult {

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
     * Returns the GALX id.
     *
     * @return mixed
     */
    public function getGalx()
    {
        return $this->data['galx'];
    }

    /**
     * Returns the GXF id.
     *
     * @return mixed
     */
    public function getGXF()
    {
        return $this->data['gxf'];
    }

    /**
     * Returns the Continue id.
     *
     * @return mixed
     */
    public function getContinue()
    {
        return $this->data['continue'];
    }

}