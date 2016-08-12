<?php

namespace NicklasW\PkmGoApi\Requests;

use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\GetPlayerMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\GetPlayerResponse;
use POGOProtos\Networking\Responses\SfidaActionLogResponse;
use ProtobufMessage;

class GetJournalRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::SFIDA_ACTION_LOG;

    /**
     * @var ProtobufMessage The request message
     */
    protected $message;

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::SFIDA_ACTION_LOG;;
    }

    /**
     * @return ProtobufMessage
     */
    public function getMessage()
    {
        return new SfidaActionLogResponse();
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
        $requestData = current($data->getReturnsArray());

        // Initialize the sfida action log response
        $sfidaActionResponse = new SfidaActionLogResponse();

        // Unmarshall the response
        $sfidaActionResponse->read($requestData);

        $this->setData($sfidaActionResponse);
    }
}