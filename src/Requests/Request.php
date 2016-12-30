<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;

abstract class Request {

    /**
     * @var mixed The response
     */
    protected $data;

    /**
     * @return int
     */
    abstract public function getType();

    /**
     * @return Message
     */
    abstract public function getMessage();

    /**
     * @param ResponseEnvelope $data
     * @return mixed
     */
    abstract public function handleResponse($data);

    /**
     * @return mixed
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param mixed $data
     */
    public function setData($data)
    {
        $this->data = $data;
    }

}