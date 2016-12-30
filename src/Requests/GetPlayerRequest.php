<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\GetPlayerMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\GetPlayerResponse;

class GetPlayerRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::GET_PLAYER;

    /**
     * @var Message The request message
     */
    protected $message;

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::GET_PLAYER;;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return new GetPlayerMessage();
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
        $playerResponse = new GetPlayerResponse();

        // Unmarshall the response
        $playerResponse->decode($requestData[0]);

        $this->setData($playerResponse);
    }
}