<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;

class AuthenticateRequest extends Request
{

    /**
     * @return int
     */
    public function getType()
    {
        // TODO: Implement getType() method.
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        // TODO: Implement getMessage() method.
    }

    /**
     * @param ResponseEnvelope $data
     * @return mixed
     */
    public function handleResponse($data)
    {
        // TODO: Implement handleResponse() method.
    }
}