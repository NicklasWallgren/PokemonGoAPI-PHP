<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\GetInventoryMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\GetInventoryResponse;

class GetInventoryRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::GET_INVENTORY;

    /**
     * @var Message The request message
     */
    protected $message;

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::GET_INVENTORY;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        return new GetInventoryMessage();
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

        // Initialize the inventory response
        $inventoryResponse = new GetInventoryResponse();

        // Unmarshall the response
        $inventoryResponse->decode($requestData[0]);

        $this->setData($inventoryResponse);
    }
}