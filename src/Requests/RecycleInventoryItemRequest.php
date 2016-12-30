<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\RecycleInventoryItemMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\RecycleInventoryItemResponse;

class RecycleInventoryItemRequest extends Request
{

    /**
     * @var integer The request type
     */
    protected $type = RequestType::RECYCLE_INVENTORY_ITEM;

    /**
     * @var Message The request message
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
     * @param integer $count
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
     * @return Message
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
        $requestData = $data->getReturns();

        // Initialize the rename pokemon response
        $recycleInventoryItemResponse = new RecycleInventoryItemResponse();

        // Unmarshall the response
        $recycleInventoryItemResponse->decode($requestData[0]);

        $this->setData($recycleInventoryItemResponse);
    }
}