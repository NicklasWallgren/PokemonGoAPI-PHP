<?php
namespace NicklasW\PkmGoApi\Requests;

use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\CheckChallengeResponse;
use ProtobufMessage;

class CheckChallengeRequest extends Request {
    /**
     * @var integer The request type
     */
    protected $type = RequestType::CHECK_CHALLENGE;
    /**
     * @var ProtobufMessage The request message
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
     * @return ProtobufMessage
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
        $requestData = current($data->getReturnsArray());
        // Initialize the player response
        $checkChallengeResponse = new CheckChallengeResponse();
        // Unmarshall the response
        $checkChallengeResponse->read($requestData);
        $this->setData($checkChallengeResponse);
    }
}
