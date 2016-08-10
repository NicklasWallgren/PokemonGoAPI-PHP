<?php

namespace NicklasW\PkmGoApi\Requests;

use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\RecycleInventoryItemMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\RecycleInventoryItemResponse;
use ProtobufMessage;

class RecycleInventoryItemRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::RECYCLE_INVENTORY_ITEM;

    /**
     * @var ProtobufMessage The request message
     */
    protected $message;

    /**
     * @var int
     */
    protected $itemId;

    /**
     * @var int
     */
    protected $itemCount;

    /**
     * RecycleInventoryItemRequest constructor.
     *
     * @param integer $itemId
     */
    public function __construct($itemId, $count)
    {
        $this->itemId = $itemId;
        $this->itemCount = $count;
    }

    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::RECYCLE_INVENTORY_ITEM;
    }

    /**
     * @return ProtobufMessage
     */
    public function getMessage()
    {
        $recycleInventoryItemMessage = new RecycleInventoryItemMessage();
        $recycleInventoryItemMessage->setItemId($this->itemId);
        $recycleInventoryItemMessage->setCount($this->itemCount);

        return $recycleInventoryItemMessage;
    }

    /**
     * Handles the request data.
     *
     * @param ResponseEnvelope $data
     * @return RecycleInventoryItemResponse
     */
    public function handleResponse($data)
    {
        // Retrieve the specific request data
        $requestData = current($data->getReturnsArray());

        // Initialize the rename pokemon response
        $recycleInventoryItemResponse = new RecycleInventoryItemResponse();

        // Unmarshall the response
        $recycleInventoryItemResponse->read($requestData);

        $this->setData($recycleInventoryItemResponse);
    }
}