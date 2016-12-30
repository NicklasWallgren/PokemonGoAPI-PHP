<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\CheckChallengeResponse;

class CheckChallengeRequest extends Request
{

    /**
     * @var integer The request type
     */
    protected $type = RequestType::CHECK_CHALLENGE;

    /**
     * @var Message The request message
     */
    protected $message;

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::CHECK_CHALLENGE;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return new CheckChallengeResponse();
    }

    /**
     * Handles the request data.
     *
     * @param ResponseEnvelope $data
     * @return mixed
     */
    public function handleResponse($data)
    {
        // Retrieve the specific request data
        $requestData = $data->getReturns();

        // Initialize the player response
        $checkChallengeResponse = new CheckChallengeResponse();

        // Unmarshall the response
        $checkChallengeResponse->decode($requestData[0]);
        $this->setData($checkChallengeResponse);
    }
}

