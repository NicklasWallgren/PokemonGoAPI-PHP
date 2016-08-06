<?php


namespace NicklasW\PkmGoApi\Authenticators\Google\Parsers\Results;

class AccountInformationResult {

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
     * Returns the Profile id.
     *
     * @return mixed
     */
    public function getProfileId()
    {
        return $this->data['profileId'];
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


}