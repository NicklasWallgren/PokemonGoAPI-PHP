<?php

namespace NicklasW\PkmGoApi\Requests;

use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\UseIncenseMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\UseIncenseResponse;
use ProtobufMessage;

class UseIncenseRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::USE_INCENSE;

    /**
     * @var ProtobufMessage The request message
     */
    protected $message;

    /**
     * @var int
     */
    protected $itemId;

    /**
     * UseIncenseRequest constructor.
     *
     * @param integer $itemId
     */
    public function __construct($itemId)
    {
        $this->itemId = $itemId;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::USE_INCENSE;
    }

    /**
     * @return ProtobufMessage
     */
    public function getMessage()
    {
        $useIncenseMessage = new UseIncenseMessage();
        $useIncenseMessage->setIncenseType($this->itemId);

        return $useIncenseMessage;
    }

    /**
     * Handles the request data.
     *
     * @param ResponseEnvelope $data
     * @return UseIncenseResponse
     */
    public function handleResponse($data)
    {
        // Retrieve the specific request data
        $requestData = $data->getReturns();

        // Initialize the rename pokemon response
        $useIncenseResponse = new UseIncenseResponse();

        // Unmarshall the response
        $useIncenseResponse->read($requestData[0]);

        $this->setData($useIncenseResponse);
    }
}