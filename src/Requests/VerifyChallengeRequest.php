<?php
namespace NicklasW\PkmGoApi\Requests;

use POGOProtos\Networking\Envelopes\ResponseEnvelope;
use POGOProtos\Networking\Requests\Messages\VerifyChallengeMessage;
use POGOProtos\Networking\Requests\RequestType;
use POGOProtos\Networking\Responses\VerifyChallengeResponse;
use ProtobufMessage;

class VerifyChallengeRequest extends Request {
    
    /**
     * @var integer The request type
     */
    protected $type = RequestType::VERIFY_CHALLENGE;
    
    /**
     * @var ProtobufMessage The request message
     */
    protected $message;
    
    /**
     * @var string
     */
    protected $token;
    
    /**
     * VerifyChallengeRequest constructor.
     *
     * @param string $token
     */
    public function __construct($token)
    {
        $this->token = $token;
    }
    
    /**
     * @return int
     */
    public function getType()
    {
        return RequestType::VERIFY_CHALLENGE;
    }
    
    /**
     * @return ProtobufMessage
     */
    public function getMessage()
    {
        $verifyChallengeMessage = new VerifyChallengeMessage();
        $verifyChallengeMessage->setToken($this->token);
        
        return $verifyChallengeMessage;
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
        
        // Initialize the VerifyChallenge response
        $verifyChallengeResponse = new VerifyChallengeResponse();
        
        // Unmarshall the response
        $verifyChallengeResponse->read($requestData);
        
        $this->setData($verifyChallengeResponse);
    }
}
