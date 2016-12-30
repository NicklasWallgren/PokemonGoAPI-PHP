<?php

namespace NicklasW\PkmGoApi\Requests;

use Google\Protobuf\Internal\Message;
use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\UseItemXpBoostMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\UseItemXpBoostResponse;

class UseItemXpBoostRequest extends Request {

    /**
     * @var integer The request type
     */
    protected $type = RequestType::USE_ITEM_XP_BOOST;

    /**
     * @var Message The request message
     */
    protected $message;

    /**
     * @var int
     */
    protected $itemId;

    /**
     * UseItemXpBoostRequest constructor.
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
        return RequestType::USE_ITEM_XP_BOOST;
    }

    /**
     * @return Message
     */
    public function getMessage()
    {
        $useItemXpBoostMessage = new UseItemXpBoostMessage();
        $useItemXpBoostMessage->setItemId($this->itemId);

        return $useItemXpBoostMessage;
    }

    /**
     * Handles the request data.
     *
     * @param ResponseEnvelope $data
     * @return UseItemXpBoostResponse
     */
    public function handleResponse($data)
    {
        // Retrieve the specific request data
        $requestData = $data->getReturns();

        // Initialize the rename pokemon response
        $useItemXpBoostResponse = new UseItemXpBoostResponse();

        // Unmarshall the response
        $useItemXpBoostResponse->decode($requestData[0]);

        $this->setData($useItemXpBoostResponse);
    }
}