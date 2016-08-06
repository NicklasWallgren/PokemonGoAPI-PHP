<?php


namespace NicklasW\PkmGoApi\Authenticators\Google\Parsers\Results;

class AuthenticationConfirmationInformationResult {

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
     * Returns the approve url.
     *
     * @return mixed
     */
    public function getApproveUrl()
    {
        return $this->data['approveUrl'];
    }

    /**
     * Returns the state warapper id.
     *
     * @return mixed
     */
    public function getStateWrapperId()
    {
        return $this->data['stateWrapperId'];
    }


}