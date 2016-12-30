<?php


namespace NicklasW\PkmGoApi\Authentication\Managers\Google\AuthenticationCredentials\Parsers\Results;

class Result {

    /**
     * @var mixed The parsed data
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
     * @param mixed $data The parsed data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}