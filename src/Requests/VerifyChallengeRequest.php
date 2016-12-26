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
        // DEBUG - dump response object
        //var_dump($data);
        // DEBUG - check status code of response for error handling, but error can return both 1 and 2 - not sure why?
        //echo "StatusCode: " . $data->getStatusCode();
        
        // Initialize the VerifyChallenge response
        $verifyChallengeResponse = new VerifyChallengeResponse();

        // Retrieve the specific request data
        $requestData = $data->getReturns();
        if ($requestData) {
            // Unmarshall the response
            $verifyChallengeResponse->read($requestData[0]);
        }else {
            // HACK to instansiate a valid VerifyChallengeResponse object when $requestData == NULL - sets success to "0";
            $verifyChallengeResponse->clearSuccess();
        }

        $this->setData($verifyChallengeResponse);
    }
}
